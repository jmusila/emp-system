<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Support\Carbon;

class UserResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->id,
            'firstname' => $this->firstname,
            'othername' => $this->othername,
            'surname' => $this->surname,
            'title' => $this->title,
            'dob' => Carbon::parse($this->dob)->toDateString(),
            'gender' => $this->gender,
            'nationality' => $this->nationality,
            'ethnicity' => $this->whenLoaded('ethnicity'),
            'county' => $this->whenLoaded('county'),
            'address' => $this->address,
            'code' => $this->code,
            'telephone_number' => $this->telephone_number,
            'mobile_number' => $this->mobile_number,
            'email' => $this->email,
            'alternative_contact_person' => $this->alternative_contact_person,
            'living_with_disability' => $this->living_with_disability,
            'nature_of_disability' => $this->nature_of_disability,
            'disability_reg_no' => $this->disability_reg_no,
            'disability_reg_date' => $this->disability_reg_date,
        ]; 
    }
}