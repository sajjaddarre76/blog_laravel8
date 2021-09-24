<?php

namespace App\Console\Commands;

use App\Models\Product;
use Illuminate\Console\Command;

class CreateNewProduct extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'create:product';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Create a new product through Artisan';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        $title = $this->ask('What is the product title');
        $original_price = $this->ask('What is the product price');
        $in_stock = $this->ask('What is the product stock');

        Product::create([
            'title' => $title,
            'original_price' => $original_price,
            'in_stock' => $in_stock
        ]);

        $this->line('Product has been created');
    }
}
