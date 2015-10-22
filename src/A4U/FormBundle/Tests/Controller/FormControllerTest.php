<?php

namespace A4U\FormBundle\Tests\Controller;

use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

class FormControllerTest extends WebTestCase
{
    public function testFormGenerico()
    {
        $client = static::createClient();

        $crawler = $client->request('GET', '/form/generico');

        $this->assertEquals(
            200, // o Symfony\Component\HttpFoundation\Response::HTTP_OK
            $client->getResponse()->getStatusCode()
        );

        $this->assertEquals(
            1,
            $crawler->filter('html:contains("Iscriviti")')->count()
        );

        #$client->request(
        #    'POST',
        #    '/form/generico',
        #    array( 'address' => 'VIA DELLE FRAZIONI',
        #        'birth_date'  => '01-09-1994',
        #        'birth_place' => 'SAN BENEDETTO DEL TRONTO',
        #        'cap' => '63071',
        #        'city'  =>  'ROTELLA',
        #        'email' =>  'ALICE.MASSACCI@GMAIL.COM',
        #        'fiscal_code' => 'MSSLCA94P41H769R',
        #        'name'  =>  'ALICE',
        #        'phone'  => '3333333333',
        #        'plchlr'  => '',
        #        'surname' => 'MASSACCI'
        #    )
        #);

        #print_r($client->getResponse());

        #$this->assertEquals(
        #    200, // o Symfony\Component\HttpFoundation\Response::HTTP_OK
        #    $client->getResponse()->getStatusCode()
        #);

        $form = $crawler->selectButton('generico[save]')->form();

        $form['generico[address]'] = 'VIA DELLE FRAZIONI';
        $form['generico[birthDate]']  = '01-09-1994';
        $form['generico[birthPlace]'] = 'SAN BENEDETTO DEL TRONTO';
        $form['generico[cap]'] = '63071';
        $form['generico[city]']  =  'ROTELLA';
        $form['generico[email]'] =  'ALICE.MASSACCI@GMAIL.COM';
        $form['generico[fiscalcode]'] = 'PROVAALICE';
        $form['generico[name]']  =  'ALICE';
        $form['generico[phone]']  = '3333333333';
        $form['generico[attendedActivity]']  = 'attività';
        $form['generico[surname]'] = 'MASSACCI';

        $client->submit($form);

        $this->assertTrue($client->getResponse()->isRedirect('/'));
    }
}
