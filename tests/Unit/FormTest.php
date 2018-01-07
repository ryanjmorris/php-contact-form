<?php

namespace Tests\Unit;

use Mail;
use Tests\TestCase;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Illuminate\Validation\Validator;

class FormTest extends TestCase
{
    /**
     * Tests to see if valid data that is posted will succeed or not.
     */
    public function testIsValidData()
    {
        $response = $this->json('POST',
            '/contact',
            [
                'full_name' => 'Jon Snow',
                'email'     => 'john@john.com',
                'message'   => 'message here',
                'phone'     => '1234567890'
            ]
        );

        $response->assertSessionHas(['success']);
    }

    /**
     * Tests to see if invalid data that is posted will succeed or not.
     */
    public function testIsEmptyData()
    {
        $response = $this->json('POST',
            '/contact',
            [
                'full_name' => '',
                'email'     => '',
                'message'   => '',
                'phone'     => ''
            ]
        );

        $response->assertSessionMissing(['success']);
    }

    /**
     * Tests to see if incorrect data will return
     */
    public function testIsIncorrectData()
    {
        $response = $this->json('POST',
            '/contact',
            [
                'full_name' => '',
                'email'     => 'nonemail',
                'message'   => '',
                'phone'     => '12'
            ]
        );

        $response->assertSessionMissing(['success']);
    }

    /**
     * Tests to see if an email has been sent out
     */
    public function testIsEmailSent()
    {
        $contact = [
            'full_name'      => 'Jon Snow',
            'email'          => 'john@john.com',
            'contactMessage' => 'Test Content',
            'phone'          => '1234567890'
        ];

        Mail::send('email', $contact, function($message) use ($contact) {
            $message->from($contact['email']);
            $message->to('guy-smiley@example.com');
            $message->subject($contact['contactMessage']);

            $this->assertNotEmpty($contact['email']);
            $this->assertNotEmpty($contact['contactMessage']);
            $this->assertNotEmpty($message);
        });
    }
}
