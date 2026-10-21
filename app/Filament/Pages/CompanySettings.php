<?php

namespace App\Filament\Pages;

use App\Models\CompanySetting;
use BackedEnum;
use Filament\Notifications\Notification;
use Filament\Pages\Page;
use Filament\Support\Icons\Heroicon;

class CompanySettings extends Page
{
    protected static ?string $navigationLabel = 'Company & Map Settings';

    protected static ?string $title = 'Company & Map Pin Settings';

    protected static \UnitEnum|string|null $navigationGroup = 'B2B Operations';

    protected static ?int $navigationSort = 1;

    protected static string|BackedEnum|null $navigationIcon = Heroicon::OutlinedBuildingOffice2;

    protected string $view = 'filament.pages.company-settings';

    public string $company_name = '';
    public string $tagline = '';
    public string $primary_address = '';
    public string $city = '';
    public string $state = '';
    public string $directions_note = '';
    public string $google_maps_url = '';
    public string $primary_email = '';
    public string $email_note = '';
    public string $primary_phone = '';
    public string $whatsapp_number = '';
    public string $operating_hours = '';
    public string $operating_hours_note = '';
    public array $map_pins = [];

    public function mount(): void
    {
        $settings = CompanySetting::getSettings();

        $this->company_name = (string) $settings->company_name;
        $this->tagline = (string) $settings->tagline;
        $this->primary_address = (string) $settings->primary_address;
        $this->city = (string) $settings->city;
        $this->state = (string) $settings->state;
        $this->directions_note = (string) $settings->directions_note;
        $this->google_maps_url = (string) $settings->google_maps_url;
        $this->primary_email = (string) $settings->primary_email;
        $this->email_note = (string) $settings->email_note;
        $this->primary_phone = (string) $settings->primary_phone;
        $this->whatsapp_number = (string) $settings->whatsapp_number;
        $this->operating_hours = (string) $settings->operating_hours;
        $this->operating_hours_note = (string) $settings->operating_hours_note;
        $this->map_pins = is_array($settings->map_pins) ? $settings->map_pins : [];
    }

    public function addPin(): void
    {
        $this->map_pins[] = [
            'title' => 'New Facility Location',
            'type' => 'Regional Office',
            'latitude' => 27.7125,
            'longitude' => 85.2850,
            'address' => 'Kathmandu, Nepal',
            'phone' => '+977 9801234567',
            'google_maps_url' => '',
            'is_primary' => false,
        ];
    }

    public function removePin(int $index): void
    {
        if (isset($this->map_pins[$index])) {
            unset($this->map_pins[$index]);
            $this->map_pins = array_values($this->map_pins);
        }
    }

    public function setPrimaryPin(int $index): void
    {
        foreach ($this->map_pins as $i => &$pin) {
            $pin['is_primary'] = ($i === $index);
        }
    }

    public function save(): void
    {
        $this->validate([
            'company_name' => 'required|string|max:255',
            'primary_email' => 'required|email|max:255',
            'primary_phone' => 'required|string|max:100',
        ]);

        $settings = CompanySetting::getSettings();
        $settings->update([
            'company_name' => $this->company_name,
            'tagline' => $this->tagline,
            'primary_address' => $this->primary_address,
            'city' => $this->city,
            'state' => $this->state,
            'directions_note' => $this->directions_note,
            'google_maps_url' => $this->google_maps_url,
            'primary_email' => $this->primary_email,
            'email_note' => $this->email_note,
            'primary_phone' => $this->primary_phone,
            'whatsapp_number' => $this->whatsapp_number,
            'operating_hours' => $this->operating_hours,
            'operating_hours_note' => $this->operating_hours_note,
            'map_pins' => array_values($this->map_pins),
        ]);

        Notification::make()
            ->title('Company settings updated successfully!')
            ->body('Public Contact Us page, dynamic map pins, and footer details updated.')
            ->success()
            ->send();
    }
}
