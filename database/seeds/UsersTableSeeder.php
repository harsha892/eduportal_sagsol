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
            'id' => 1,
            'email' => 'aa@sagsoleedu.com',
            'password' => bcrypt('test1234'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
        ]);

        DB::table('user_details')->insert([
            'id' => 1,
            'user_id' => 1,
            'first_name' => 'Test',
            'last_name' => 'Admin',
            'phone' => '0909090909',
            'phone_verified' => '1',
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
        ]);

        DB::table('activations')->insert([
            'user_id' => 1,
            'code' => 'testcode',
            'completed' => 1,
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
        ]);

        DB::table('roles')->insert([
            [
                'id' => 1,
                'slug' => 'admin',
                'name' => 'aa',
                'permissions' => '[]',
                'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            ],
            [
                'id' => 2,
                'slug' => 'member',
                'name' => 'am',
                'permissions' => '[]',
                'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            ],
            [
                'id' => 3,
                'slug' => 'incharge',
                'name' => 'ai',
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
            'user_id' => 1,
            'role_id' => 1,
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
        ]);
    }
}
