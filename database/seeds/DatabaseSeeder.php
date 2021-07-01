<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
  /**
   * Seed the application's database.
   *
   * @return void
   */
  public function run()
  {
    // $this->call(UserSeeder::class);
    $user1 = \App\User::create([
      'name' => 'Mide Coder',
      'email' => 'flioolawale123@gmail.com',
      'username' => 'MideCoder',
      'email_verified_at' => now(),
      'password' => Hash::make('olawale123'),
    ]);

    $user2 = \App\User::create([
      'name' => 'Talabi Emmanuel',
      'email' => 'emmanuel@mideblog.com',
      'username' => 'OlawaleJnr',
      'email_verified_at' => now(),
      'password' => Hash::make('olawale123'),
    ]);

    $user3 = \App\User::create([
      'name' => 'Oziri Emeka',
      'email' => 'oziriemeka@mideblog.com',
      'username' => 'Ozirimania',
      'email_verified_at' => now(),
      'password' => Hash::make('olawale123'),
    ]);

    $user4 = \App\User::create([
      'name' => 'Ibidapo Raphael',
      'email' => 'ibidaporaph@mideblog.com',
      'username' => 'Shugbe',
      'email_verified_at' => now(),
      'password' => Hash::make('olawale123'),
    ]);

    $user5 = \App\User::create([
      'name' => 'Yusuff Olayinka',
      'email' => 'ryam@mideblog.com',
      'username' => 'Ryam',
      'email_verified_at' => now(),
      'password' => Hash::make('olawale123'),
    ]);

    $user6 = \App\User::create([
      'name' => 'Olabanji Temiloluwa',
      'email' => 'olabanji@mideblog.com',
      'username' => 'Temi',
      'email_verified_at' => now(),
      'password' => Hash::make('olawale123'),
    ]);

    $user7 = \App\User::create([
      'name' => 'Isabella',
      'email' => 'isabella@mideblog.com',
      'username' => 'Isabella',
      'email_verified_at' => now(),
      'password' => Hash::make('olawale123'),
    ]);

    $user8 = \App\User::create([
      'name' => 'Mark Zukerburg',
      'email' => 'markindustry@mideblog.com',
      'username' => 'Mark Zukerburg',
      'email_verified_at' => now(),
      'password' => Hash::make('olawale123'),
    ]);

    \App\Admin::create([
      'name' => 'Talabi Ayomide',
      'email' => 'flioolawale@mideblog.com',
      'email_verified_at' => now(),
      'password' => Hash::make('olawale123'),
    ]);

    \App\Followship::create([
      'user1_id' => $user2->id,
      'user2_id' => 1,
    ]);

    \App\Followship::create([
      'user1_id' => $user3->id,
      'user2_id' => 1,
    ]);

    \App\Followship::create([
      'user1_id' => $user4->id,
      'user2_id' => 1,
    ]);

    \App\Followship::create([
      'user1_id' => $user5->id,
      'user2_id' => 1,
    ]);

    \App\Followship::create([
      'user1_id' => $user1->id,
      'user2_id' => $user6->id,
    ]);

    \App\Followship::create([
      'user1_id' => $user1->id,
      'user2_id' => $user3->id,
    ]);

    \App\Followship::create([
      'user1_id' => $user1->id,
      'user2_id' => $user7->id,
    ]);
  }
}
