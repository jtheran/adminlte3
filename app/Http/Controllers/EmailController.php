<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Webklex\PHPIMAP\ClientManager;

class EmailController extends Controller
{
    public function index() {

        $cm = new ClientManager('config\imap.php');

        $client = $cm->account('account_identifier');

        $client->connect();

        $folder = $client->getFolder('INBOX');
        $emails = $folder->messages()->all()->get();

        return view('mail', ['emails' => $emails]);
    }
}
