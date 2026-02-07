<?php

use Livewire\Component;

new class extends Component {
    //
};
?>

<div>
    <fieldset class="fieldset bg-base-200 border-base-300 rounded-box w-xs border p-4">
        <legend class="fieldset-legend">Page details</legend>

        <label class="label">Full Name</label>
        <input type="text" class="input" placeholder="My awesome page" />

        <label class="label">Business Name</label>
        <input type="text" class="input" placeholder="my-awesome-page" />

        <label class="label">Author</label>
        <input type="text" class="input" placeholder="Name" />
    </fieldset>
</div>
