<div>
    <p>Dear Guy Smiley,</p>

    <p>
        My name is {{ $full_name }} and I wanted to let you know about this personalized message I have for you.
        {{ $contactMessage }}.
        Here is my email at: {{ $email }}.

        @if ($phone != '')
            If you dislike emailing, here is my phone number - {{ $phone }}.
        @endif
    </p>
</div>