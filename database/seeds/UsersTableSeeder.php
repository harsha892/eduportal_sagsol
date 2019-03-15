<?php
use Carbon\Carbon;
use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            [
                'id' => 1,
                'email' => 'aa@test.com',
                'phone' => '0909090909',
                'password' => bcrypt('test1234'),
                'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            ],
            [
                'id' => 2,
                'email' => 'am@test.com',
                'phone' => '0909090908',
                'password' => bcrypt('test1234'),
                'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            ],
            [
                'id' => 3,
                'email' => 'ai@test.com',
                'phone' => '0909090907',
                'password' => bcrypt('test1234'),
                'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            ],
            [
                'id' => 4,
                'email' => 'student@test.com',
                'phone' => '0909090906',
                'password' => bcrypt('test1234'),
                'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            ],
        ]);

        DB::table('user_details')->insert([
            [
                'id' => 1,
                'user_id' => 1,
                'first_name' => 'AA',
                'last_name' => 'Test',
                'phone' => '0909090909',
                'phone_verified' => '1',
                'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            ],

            [
                'id' => 2,
                'user_id' => 2,
                'first_name' => 'AM',
                'last_name' => 'Test',
                'phone' => '0909090908',
                'phone_verified' => '1',
                'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            ],

            [
                'id' => 3,
                'user_id' => 3,
                'first_name' => 'AI',
                'last_name' => 'Test',
                'phone' => '0909090907',
                'phone_verified' => '1',
                'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            ],
            [
                'id' => 4,
                'user_id' => 4,
                'first_name' => 'Student',
                'last_name' => 'Test',
                'phone' => '0909090906',
                'phone_verified' => '1',
                'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            ],
        ]);

        DB::table('activations')->insert([
            [
                'user_id' => 1,
                'code' => 'testcode',
                'completed' => 1,
                'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            ],
            [
                'user_id' => 2,
                'code' => 'testcode',
                'completed' => 1,
                'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            ],
            [
                'user_id' => 3,
                'code' => 'testcode',
                'completed' => 1,
                'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            ],
            [
                'user_id' => 4,
                'code' => 'testcode',
                'completed' => 1,
                'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            ],
        ]);

        DB::table('roles')->insert([
            [
                'id' => 1,
                'slug' => 'admin',
                'name' => 'AA',
                'permissions' => '[]',
                'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            ],
            [
                'id' => 2,
                'slug' => 'member',
                'name' => 'AM',
                'permissions' => '[]',
                'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            ],
            [
                'id' => 3,
                'slug' => 'in-charge',
                'name' => 'AI',
                'permissions' => '[]',
                'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            ],
            [
                'id' => 4,
                'slug' => 'student',
                'name' => 'Student',
                'permissions' => '[]',
                'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            ],
        ]);

        DB::table('role_users')->insert([
            [
                'user_id' => 1,
                'role_id' => 1,
                'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            ],
            [
                'user_id' => 2,
                'role_id' => 2,
                'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            ],
            [
                'user_id' => 3,
                'role_id' => 3,
                'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            ],
            [
                'user_id' => 4,
                'role_id' => 4,
                'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            ],
        ]);
    }
}
