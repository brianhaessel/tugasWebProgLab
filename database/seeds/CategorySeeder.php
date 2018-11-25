<?php

use Illuminate\Database\Seeder;

use App\Category;

class CategorySeeder extends Seeder
{

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->newCategory('Landscape');
        $this->newCategory('Abstract');
        $this->newCategory('Futuristic');
        $this->newCategory('Potrait');
        $this->newCategory('Still');
    }

    private function newCategory(string $name) {
        $category = new Category();
        $category->name = $name;
        $category->save();
    }
}
