<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Faq;

class FaqSeeder extends Seeder
{
    public function run(): void
    {
        $faqs = [
            [
                'question' => 'What are your check-in and check-out times?',
                'answer' => 'Check-in time is from 2:00 PM onwards, and check-out time is until 12:00 PM (noon). Early check-in and late check-out may be available upon request, subject to availability and additional charges.'
            ],
            [
                'question' => 'Do you offer airport shuttle service?',
                'answer' => 'Yes, we provide complimentary airport shuttle service for our guests. Please inform us of your flight details at least 24 hours in advance to arrange pickup. The shuttle runs every hour from 6:00 AM to 10:00 PM.'
            ],
            [
                'question' => 'Is breakfast included in the room rate?',
                'answer' => 'Breakfast inclusion depends on the room package you select. Some of our packages include complimentary breakfast, while others offer it as an add-on. Please check your booking details or contact our reception for clarification.'
            ],
            [
                'question' => 'What is your cancellation policy?',
                'answer' => 'Free cancellation is available up to 48 hours before your scheduled arrival. Cancellations made within 48 hours of arrival will incur a charge equivalent to one night\'s stay. No-shows will be charged the full booking amount.'
            ],
            [
                'question' => 'Do you have parking facilities?',
                'answer' => 'Yes, we offer free on-site parking for all our guests. We have both covered and open parking spaces available on a first-come, first-served basis. Valet parking service is also available for a nominal fee.'
            ],
            [
                'question' => 'Are pets allowed in the hotel?',
                'answer' => 'We are a pet-friendly hotel! Small to medium-sized pets are welcome with prior notification. A pet fee of 500 ETB per night applies, and pets must be kept on a leash in public areas. Please inform us during booking if you\'ll be bringing a pet.'
            ],
            [
                'question' => 'What payment methods do you accept?',
                'answer' => 'We accept various payment methods including cash (Ethiopian Birr), major credit cards (Visa, Mastercard), debit cards, and mobile payment services like Chapa. Online bookings can be paid through our secure payment gateway.'
            ],
            [
                'question' => 'Do you offer room service?',
                'answer' => 'Yes, 24-hour room service is available for all our guests. You can order from our extensive menu featuring local and international cuisine. Room service charges apply as per the menu prices plus a service charge.'
            ],
            [
                'question' => 'Is Wi-Fi available in the rooms?',
                'answer' => 'Complimentary high-speed Wi-Fi is available throughout the hotel, including all guest rooms, lobby, restaurant, and common areas. The network name and password will be provided at check-in.'
            ],
            [
                'question' => 'Do you have facilities for business meetings or events?',
                'answer' => 'Yes, we have fully equipped conference rooms and event spaces that can accommodate 10 to 200 people. We offer audio-visual equipment, catering services, and dedicated event coordinators. Please contact our events team for bookings and pricing.'
            ],
            [
                'question' => 'What amenities are included in the rooms?',
                'answer' => 'All our rooms include air conditioning, flat-screen TV with cable channels, mini-fridge, tea/coffee maker, safe deposit box, complimentary toiletries, hair dryer, iron and ironing board, and 24-hour room service.'
            ],
            [
                'question' => 'Is there a gym or fitness center?',
                'answer' => 'Yes, we have a modern fitness center equipped with cardio machines, free weights, and exercise equipment. It\'s open 24/7 for all hotel guests at no additional charge. We also offer yoga mats and towel service.'
            ],
            [
                'question' => 'Can I request extra beds or cribs?',
                'answer' => 'Yes, extra beds and baby cribs are available upon request, subject to room capacity and availability. Extra bed charges are 300 ETB per night, while cribs are provided free of charge. Please request these during booking or at least 24 hours in advance.'
            ],
            [
                'question' => 'Do you provide laundry services?',
                'answer' => 'Yes, we offer same-day laundry and dry-cleaning services. Items collected before 10:00 AM will be returned by 6:00 PM the same day. Express service is available for an additional charge. Price list is available in your room or at reception.'
            ],
            [
                'question' => 'Are there restaurants on-site?',
                'answer' => 'We have two on-site restaurants: our main restaurant serving international buffet breakfast, lunch, and dinner, and a specialty restaurant offering traditional Ethiopian cuisine. We also have a rooftop bar with stunning city views open from 5:00 PM to midnight.'
            ],
            [
                'question' => 'What COVID-19 safety measures are in place?',
                'answer' => 'We follow strict hygiene protocols including enhanced cleaning of all areas, hand sanitizer stations throughout the property, contactless check-in/out options, social distancing measures, and staff wearing masks. All rooms are thoroughly sanitized between guests.'
            ],
            [
                'question' => 'Can I modify my booking after confirmation?',
                'answer' => 'Yes, you can modify your booking dates or room type subject to availability. Please contact us at least 48 hours before your arrival. Changes may result in rate differences which will be adjusted accordingly. Modification fees may apply for certain bookings.'
            ],
            [
                'question' => 'Do you offer long-term stay discounts?',
                'answer' => 'Yes, we offer attractive discounts for extended stays of 7 nights or more. Weekly rates provide 10% discount, and monthly rates offer up to 25% discount. Please contact our reservations team for customized long-term stay packages.'
            ],
            [
                'question' => 'Is smoking allowed in the hotel?',
                'answer' => 'We are a non-smoking hotel. Smoking is strictly prohibited in all indoor areas including guest rooms and public spaces. Designated smoking areas are available outdoors. A cleaning fee of 2,000 ETB will be charged for smoking violations in rooms.'
            ],
            [
                'question' => 'What tourist attractions are nearby?',
                'answer' => 'Our hotel is conveniently located near major attractions including the National Museum (2 km), Unity Park (3 km), Meskel Square (1.5 km), and various shopping centers. Our concierge can help arrange tours and provide recommendations for local attractions, restaurants, and entertainment.'
            ]
        ];

        foreach ($faqs as $faq) {
            Faq::create($faq);
        }
    }
}
