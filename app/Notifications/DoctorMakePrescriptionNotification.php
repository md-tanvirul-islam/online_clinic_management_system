<?php

namespace App\Notifications;

use App\Models\Doctor;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;
use App\Models\Patient;

class DoctorMakePrescriptionNotification extends Notification
{
    use Queueable;
    protected $prescription;
    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct($createdPrescription)
    {
        $this->prescription = $createdPrescription;
    }

    /**
     * Get the notification's delivery channels.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function via($notifiable)
    {
        // return ['mail'];
        return ['database'];
    }

    /**
     * Get the mail representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return \Illuminate\Notifications\Messages\MailMessage
     */
    public function toMail($notifiable)
    {
        return (new MailMessage)
                    ->line('The introduction to the notification.')
                    ->action('Notification Action', url('/'))
                    ->line('Thank you for using our application!');
    }

    /**
     * Get the array representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function toArray($notifiable)
    {
        $doctor = Doctor::find($this->prescription->doctor_id);

        return [
            'link' => route('patient.own.prescription.view',[$this->prescription->id]),
            'message' => $doctor->name." has made a prescription for You in ."
        ];
    }
}
