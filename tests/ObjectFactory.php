<?php


namespace Tests;

use App\Models\Applications\Application;
use App\Models\Configs\LoanPurpose;
use App\Models\Products\Product;
use App\Models\Users\Customer;
use App\Models\Users\Lender;
use App\Models\Users\User;
use Illuminate\Support\Collection;
use Spatie\Permission\Models\Role;

trait ObjectFactory
{
    protected function createLoanApplication(
        array $attributes = [],
        Customer $customer = null,
        LoanPurpose $loanPurpose = null,
        Collection $products = null
    ) {
        if (is_null($customer)) {
            $customer = $this->createCustomer();
        }
        if (is_null($loanPurpose)) {
            $loanPurpose = factory(LoanPurpose::class)->create();
        }
        if (is_null($products)) {
            $products = factory(Product::class, 2)->create();
        }
        $attributes = array_merge(
            [
                'customer_id' => $customer->id,
                'loan_purpose_id' => $loanPurpose->id,
            ],
            $attributes
        );
        $application = factory(Application::class)->create($attributes);

        $application->products()->attach($products->pluck('id'));

        return $application;
    }

    protected function createUser(array $attributes = []): User
    {
        return factory(User::class)->create($attributes);
    }

    protected function createUserOfRole($role)
    {
        $user = $this->createUser();
        $this->createRole($role);
        $user->assignRole($role);

        if ($role == 'customer') {
            factory(Customer::class)->create(['user_id' => $user->id]);
        } elseif ($role == 'lender') {
            factory(Lender::class)->create(['user_id' => $user->id]);
        }
        return $user;
    }

    protected function createRole($role)
    {
        return Role::updateOrCreate(['name' => $role]);
    }

    protected function createCustomer(array $attributes = [], User $user = null)
    {
        if (is_null($user)) {
            $user = $this->createUser();
        }
        $attributes = array_merge(
            ['user_id' => $user->id],
            $attributes
        );
        return factory(Customer::class)->create($attributes);
    }
}
