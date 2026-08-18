<?php

namespace App\Livewire\General;

use Livewire\Component;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Traits\HasRoles;

use App\Models\Common\Chat;
use App\Models\Common\Message;
use App\Models\Common\MailRecipient;

use App\Models\User;

//Livewire Alerts
use Jantinnerezo\LivewireAlert\Facades\LivewireAlert;

class InternalMessages extends Component
{
    //panels
    public $inboxPanel = true, $readPanel = false, $composePanel = true; 
    //public $sent = false, $drafts = false, $junk = false, $trash = false;

    public $users, $compose_subject, $mail_to, $mailtox, $message_body;

    public $def_to = [];

    public $counts;

    //these are mail folders 
    public $inbox, $sent, $drafts, $trash;
    public $newMail, $sentMail, $unreadInbox; 

    #[On('select-updated')]
    public function updated($mailtox, $value)
    {
        //$this->def_to[intval($value)] = $this->users[intval($value)];
        //$this->dispatch("update-value");
        
    }

    public function mount()
    {
        // Optional: counts for sidebar badges
        $this->counts = [
            'inbox'  => MailRecipient::forUser()->folder('inbox')->count(),
            'sent'   => MailRecipient::forUser()->folder('sent')->count(),
            'drafts' => MailRecipient::forUser()->folder('drafts')->count(),
            'trash'  => MailRecipient::forUser()->folder('trash')->count(),
            //'unread' => MailRecipient::forUser()->folder('inbox')->unread()->count(),
        ];
        $this->showInbox();
    }

    public function render()
    {
        //dd($this->users);
        
        return view('livewire.general.internal-messages');
    }

    public function removeTo($id)
    {
        unset($this->mailtox[array_search($id, $this->mailtox)]);
    }

    //these are folders
    public function showInbox()
    {
        $this->resetPanels();
        /*  
        $this->newMail = MailRecipents::with([
                                'message.sender' // eager load sender relationship
                            ])
                            ->where('user_id', auth()->id())
                            ->where('folder', 'inbox')
                            ->orderByDesc('created_at')
                            ->get();
        //dd($this->newMail);
        */
        $this->inbox = MailRecipient::with(['message.sender'])
            ->forUser()
            ->folder('inbox')
            ->orderByDesc('created_at')
            ->get();
            
        $this->unreadInbox = MailRecipient::with(['message.sender'])
                                        ->forUser()
                                        ->folder('inbox')
                                        ->unread()
                                        ->orderByDesc('created_at')
                                        ->get();
        //dd($this->inbox);
        $this->inboxPanel = true;
    }

    //sent mail folder
    public function showSent()
    {
        /*
        $this->sent = MailRecipient::with(['message.recipients.user'])
                                ->where('user_id', auth()->id())
                                ->where('folder', 'sent')
                                ->orderByDesc('created_at')
                                ->get();
        */
        $this->sent = MailRecipient::with(['message.recipients.user'])
                ->forUser()
                ->folder('sent')
                ->orderByDesc('created_at')
                ->get();

        //dd($this->sent);
    }

    //draft folder
    public function showDrafts()
    {
        $this->drafts = MailRecipient::with(['message'])
                                ->where('user_id', auth()->id())
                                ->where('folder', 'drafts')
                                ->orderByDesc('created_at')
                                ->get();
        //dd($this->drafts);
    }

    //trash folder
    public function showTrash()
    {
        $trash = MailRecipient::with(['message.sender'])
                                ->where('user_id', auth()->id())
                                ->where('folder', 'trash')
                                ->orderByDesc('created_at')
                                ->get();
        //dd($this->trash);
    }

    public function resetMessage()
    {
        dd("reached reset message");
    }
        
    public function saveDraft()
    {
        dd("reached draft saving");
    }

    public function sendMessage()
    {
        //first check whether $mailtox has array and minium one value present
        if(!empty($this->mailtox) > 0 )
        {
            if($this->compose_subject != null)
            {
                if($this->message_body != null || $this->message_body != "")
                {
                    //dd($this->mailtox, $this->compose_subject, $this->message_body);

                    // actual mail sent to all.
                    $nm = new Message();
                    $nm->sender_id = Auth::user()->id;
                    $nm->subject = $this->compose_subject;
                    $nm->content = $this->message_body;
                    $nm->is_broadcast = 0;
                    $nm->sent_on = date('Y-m-d H:i:s');
                    //dd($nm);
                    $nm->save();

                    //sending all mail recipients here 
                    // may exclude in case sender's own id present 
                    // as it will be his sent folder
                    foreach($this->mailtox as $val)
                    {
                        $mr = new MailRecipent();
                        $mr->message_id = $nm->id;
                        $mr->user_id = intval($val);
                        $mr->folder = 'inbox';
                        $mr->is_cc = 0;
                        $mr->is_seen = 0;
                        $mr->seen_at = null;
                        //dd($mr);
                        $mr->save();
                    }

                    //sender's sent copy of the message
                    $mr = new MailRecipent();
                    $mr->message_id = $nm->id;
                    $mr->user_id = Auth::user()->id;;
                    $mr->folder = 'sent';
                    $mr->is_cc = 1;
                    $mr->is_seen = 1;
                    $mr->seen_at = date('Y-m-d H:i:s');
                    //dd($mr);
                    $mr->save();

                    //now reset form fields
                    $this->mailtox = null;
                    $this->compose_subject = null;
                    $this->message_body = null;

                    LivewireAlert::title('Message Sent Successful ....')->success()->show();

                }else{
                    LivewireAlert::title('Message Body is empty, Cannot send ....')->warning()->show();
                }
            }else {
                LivewireAlert::title('Subject is empty, send? ....')->warning()->show();
            }
        }else {
            LivewireAlert::title('One Recipent Must Be Selected')->warning()->show();
        }
    }

    public function deleteMessage($ids)
    {
        //UPDATE message_recipients
        //SET folder = 'trash'
        //WHERE id = :recipientEntryId AND user_id = :currentUserId;
        //$input['folder'] = 'trash';

        foreach($ids as $row)
        {
            $result = MailRecipient::where('id', $row)
                                        ->where('user_id', auth()->id())
                                        ->update(['folder' => 'trash']);
        }
    }

    public function markAsRead($mail_recipient_id)
    {
        MailRecipient::where('id', $mail_recipient_id)
                        ->where('user_id', auth()->id())
                        ->update([
                        'is_seen' => 1,
                        'seen_at' => now()
        ]);
    }


    public function compose()
    {
        //dd("reached");
        $this->users = User::pluck('name','id')->toArray();

        $this->resetPanels();
        $this->composePanel = true;
        $this->dispatch('compose-textarea');
    }

    public function resetPanels()
    {
        $this->inboxPanel = false;
        $this->composePanel = false;
        $this->readPanel = false;
    }

    //folder specific queries



}
