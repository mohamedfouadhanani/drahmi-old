<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table("categories")->delete();
        DB::table("categories")->insert([
            ["name" => "Housing", "description" => "Expenses related to your place of residence, including rent or mortgage payments, utilities, and maintenance."],
            ["name" => "Transportation", "description" => "Costs associated with getting around, like fuel, public transportation, and vehicle maintenance."],
            ["name" => "Food", "description" => "Expenditures on groceries, dining out, and food-related expenses."],
            ["name" => "Utilities", "description" => "Bills for services like internet, cable TV, phone, and streaming subscriptions."],
            ["name" => "Debt Payments", "description" => "Payments towards outstanding debts, including credit card bills and loan repayments."],
            ["name" => "Savings and Investments", "description" => "Funds saved or invested for future goals, such as retirement or emergency savings."],
            ["name" => "Healthcare", "description" => "Medical expenses, including health insurance, doctor's visits, and medication costs."],
            ["name" => "Entertainment", "description" => "Money spent on entertainment activities, such as movies, concerts, and hobbies."],
            ["name" => "Education", "description" => "Costs related to education, including tuition fees, books, and educational materials."],
            ["name" => "Gifts and Donations", "description" => "Expenditures on gifts for special occasions and charitable donations."],
            ["name" => "Travel", "description" => "Expenses associated with travel, including airfare, accommodations, and dining while traveling."],
            ["name" => "Insurance", "description" => "Payments for various insurance policies, such as life insurance and car insurance."],
            ["name" => "Miscellaneous", "description" => "Items or expenses that don't fit into other predefined categories."],
            ["name" => "Taxes", "description" => "Payments made for various taxes, such as income tax, property tax, and sales tax."],
            ["name" => "Emergency Fund", "description" => "Contributions to a fund set aside for unexpected financial emergencies."],
            ["name" => "Kids' Expenses", "description" => "Costs associated with raising children, including childcare and school-related expenses."],
            ["name" => "Pet Expenses", "description" => "Expenses related to pet ownership, including pet food, veterinary bills, and grooming."],
            ["name" => "Investment Income", "description" => "Income generated from investments, such as dividends and capital gains."],
            ["name" => "Loan Interest", "description" => "Interest paid on loans or credit card balances."],
        ]);
    }
}
