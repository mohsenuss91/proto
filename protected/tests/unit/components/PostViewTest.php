<?php
/**
* 
*/
class PostViewTest extends CTestCase
{

	public function testProperties() {
		$record=array(
			'id'=>1,
			'guid' => '3a9e6228-cd0e-3795-8447-0c8d8fd8f25c',
	        'title' => 'Aut tenetur dignissimos vero doloribus necessitatibus ut quisquam.',
	        'content' => 'Eos officia sequi aut odio. Molestias natus ut saepe vero voluptates dignissimos. Distinctio velit tenetur nemo minus voluptas.',
	        'excerpt' => 'Ut veniam totam blanditiis sequi et impedit ut. Harum beatae non et libero.',
	        'author'=>2,
	        'publication_date'=>new DateTime(),
	        'categories'=>array(3,4,9,100),
	        'tags'=>array(98,22,5,10),
	        'status'=>1,
	        'visibility'=>1
	        
        );
		$postView = Yii::createComponent(
			array('class'=>'PostView'),
			$record['id'],
			$record['title'],
			$record['content'],
			$record['excerpt'],
			$record['author'],
			$record['publication_date'],
			$record['categories'],
			$record['tags'],
			$record['status'],
			$record['visibility']
			);

		$this->assertInstanceOf('PostView',$postView);
	}
}