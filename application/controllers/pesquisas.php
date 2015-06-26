 <?php
class Pesquisas extends CI_Controller
{  
    function index()  
    {   
        $this->load->library('zend', 'Zend/Feed');
		$this->load->library('zend', 'Zend/Search/Lucene');
		$this->load->library('zend');
		$this->zend->load('Zend/Feed');
		$this->zend->load('Zend/Search/Lucene');     

		//Create index.   
		$index = new Zend_Search_Lucene('C:\xampp\xampp\htdocs\controle_frota\lucene\feeds_index', true);      
		$feeds = array(    
			'http://oglobo.globo.com/rss.xml?limite=50');       

		//grab each feed.   
		foreach($feeds as $feed)   
		{    
			$channel = Zend_Feed::import($feed);    
			echo $channel->title().'<br />';        

			//index each item.    
			foreach($channel->items as $item)    
			{     
				if ($item->link() && $item->title() && $item->description())     
				{      
					//create an index doc.      
					$doc = new Zend_Search_Lucene_Document();            
					$doc->addField(Zend_Search_Lucene_Field::Keyword(
						'link', $this->sanitize($item->link())));      
					$doc->addField(Zend_Search_Lucene_Field::Text(
						'title', $this->sanitize($item->title())));      
					$doc->addField(Zend_Search_Lucene_Field::Unstored(
						'contents', $this->sanitize($item->description())));            

					echo "\tAdding: ". $item->title() .'<br />';      
					$index->addDocument($doc);     
				}    
			}   
		}      

		$index->commit();      
		echo $index->count() .' Documents indexed.<br />'; 
    }

    function sanitize($input)
    {
        return htmlentities(strip_tags($input));
    }
	
	function search($query)  
	{   
		$this->load->library('zend', 'Zend/Search/Lucene');   
		$this->load->library('zend');   
		$this->zend->load('Zend/Search/Lucene');      

		$index = new Zend_Search_Lucene('C:\xampp\xampp\htdocs\controle_frota\lucene\feeds_index');      
		
		$hits = $index->find($query);      

		echo 'Index contains '. $index->count() .
			' documents.<br /><br />';   
		echo 'Search for "'. $query .'" returned '. count($hits) .
			' hits<br /><br />';      

		foreach($hits as $hit)   
		{    
			echo $hit->title .'<br />';    
			echo 'Score: '. sprintf('%.2f', $hit->score) .'<br />';    
			echo $hit->link .'<br /><br />';   
		}    
	}
}
/* End of file home.php */
/* Location: ./system/application/controllers/home.php */