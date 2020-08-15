<?php

namespace App\Controllers\Admin;

use App\Models\Contact;
use App\Services\Validators\ContactValidator;
use Input, Mail, Redirect, Session;

class ContactsController extends \BaseController
{

    // to validate a contact
    private $validation;

    // inject the dependencies through the constructor
    public function __construct(Contact $contact, ContactValidator $validation)
    {
        $this->contact = $contact;
        $this->validation = $validation;
    }

    /**
     * Delete a contact.
     *
     * @param int $id
     * @return view
     */
    public function destroy($id)
    {
        // find the id in this model
        $this->contact = $this->contact->find($id);

        // delete reference in db
        $this->contact->delete();

        // flash a message to session to notify user
        Session::flash('success', trans('contacts.destroy-success'));
        return Redirect::route('admin.contacts.index');
    }

    /**
     * Show contact dashboard and all contacts.
     *
     * @return view
     */
    public function index()
    {
        return \View::make('admin.contacts.index')->with('contacts', $this->contact->all());
    }

    /**
     * Display the contact form on the front end.
     *
     * @return Redirect
     */
    public function indexFront()
    {
        return \View::make('front.contacts.form')->with('contacts', $this->contact->all());
    }

    /**
     * Process contact form page requests.
     *
     * @return Redirect
     */
    public function postContact()
    {
        if ($this->validation->passes())
        {
            $data = array(
                'email'     => Input::get('email'),
                'body'      => Input::get('message'),
                'from'      => 'Ink Agency',
                'from-email'=> 'info@inkagency.com',
                'name'      => Input::get('name'),
                'subject'   => Input::get('subject'),
                'to'        => 'Matt Gagnon',
                'to-email'  => 'mgagnon@inkagency.com',
            );

            $this->contact->email   = $data['email'];
            $this->contact->message = $data['body'];
            $this->contact->name    = $data['name'];
            $this->contact->subject = $data['subject'];
            $this->contact->save();

            // Need to configure mail before this works; file is in app/config/mail.php
            // 'pretend' method below (development) logs a record to app/storage/logs for confirmation
          Mail::pretend('emails.contact.submit', $data, function($body) use ($data)
            // queue email - faster than send;
            // params are: view for email body, data passed to view, and closure for email message
//            Mail::queue('emails.contact.submit', $data, function($body) use ($data)
            {
                $body
                    ->from($data['from-email'], $data['from'])
                    ->to($data['to-email'], $data['to'])
                    ->subject($data['subject']);
            });

            // flash a message to session to notify user
            Session::flash('success', trans('contacts.store-success'));
            return Redirect::route('front.contacts');
        } else {
            // flash a message to session to notify user
            Session::flash('error', trans('contacts.store-failure'));
            return Redirect::back()->withInput()->withErrors($this->validation->errors);
        }
    }

    /**
     * Show a single contact.
     *
     * @param int $id
     * @return view
     */
    public function show($id)
    {
        return \View::make('admin.contacts.show')->with('contact', $this->contact->find($id));
    }

}
