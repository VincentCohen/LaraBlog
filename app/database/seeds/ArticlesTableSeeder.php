<?php
use Faker\Factory as Faker;
use Blog\Article\Entity\Article;

class ArticlesTableSeeder extends Seeder {

	public function run()
	{
		$faker = Faker::create();

        $gender = ['male', 'female'];

		foreach(range(1, 10) as $index)
		{
            $paragraphs = [];

            for ($i = 0; $i < rand(1,5); $i++)
            {
                // ugly
                $paragraphs[] = '<p>'.$faker->realText(rand(200, 1200)).'</p>';
            }

            $title = $faker->sentence(rand(4,12));

			Article::create([
                'title' => $title,
                'slug' => str_replace(' ' , '-', strtolower($title)),
                'author' => $faker->name($gender[rand(0,1)]),
                'description' => $faker->text(),
                'contents' => implode('', $paragraphs), //$faker->paragraphs(rand(2, 8)),
			]);
		}
	}

}