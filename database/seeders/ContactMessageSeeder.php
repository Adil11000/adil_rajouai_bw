<?php


use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ContactMessageSeeder extends Seeder
{
    public function run()
    {
        DB::table('contact_messages')->insert([
            'name' => 'Lucas R',
            'email' => 'lucas@example.com',
            'message' => 'Application for Sales Associate Position - Brussels

            Dear Hiring Team,
            
            I am excited to apply for the Sales Associate position at your retail store in Brussels, as advertised on your website. With my strong communication skills and customer-centric approach, I am confident in my ability to contribute to a positive shopping experience for customers.
            
            Please find my resume attached, and I am available for an interview at your earliest convenience. You can contact me at +32 489 876 543.
            
            Thank you for considering my application.',
        ]);

       
    }
}
