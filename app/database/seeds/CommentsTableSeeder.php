<?php
use Blog\Comment\Entity\Comment;
use Faker\Factory as Faker;

class CommentsTableSeeder extends Seeder {

	public function run()
	{
		$faker = Faker::create();

		foreach(range(1, 40) as $index)
		{
			Comment::create([
				'article_id' => rand(1, 10),
				'author' => $faker->userName(),
				'contents' => $faker->text(),
			]);
		}
	}

}


