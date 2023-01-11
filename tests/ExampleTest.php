<?php
use ven\PasswordChangeNotification\Tests\Models\User;
use Illuminate\Support\Facades\Mail;

it('can test', function () {
    // expect(true)->toBeTrue();
    Mail::fake();
    // $user = User::factory()->create();
    $user = new User();
    $user->name = "new name";
    $user->email = "m@m.com";
    $user->password = bcrypt('123456');
    $user->save();
    $user->password = bcrypt('123456');
    $user->save();
    // dd($user);

    Mail::assertSent($user->passwordChangedNotification()::class);
});
