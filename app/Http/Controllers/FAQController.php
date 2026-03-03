<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class FAQController extends Controller
{
    public function index()
    {
        // You can fetch FAQs from the database if needed
        $faqs = [
            ['question' => 'What services does your travel agency offer?', 'answer' => 'We offer a wide range of travel services, including flight bookings, hotel reservations, vacation packages, guided tours, car rentals, and travel insurance. We also specialize in customized travel itineraries to suit your preferences and budget.'],
            ['question' => 'How can I book a trip with your agency?', 'answer' => 'You can book a trip directly through our website by browsing our available destinations, packages, and services. Alternatively, you can contact our customer service team by phone or email, and our travel experts will assist you with the booking process.'],
            ['question' => 'What should I do if I need to cancel or modify my booking?', 'answer' => 'If you need to cancel or modify your booking, please contact our customer support team as soon as possible. The ability to make changes depends on the specific airline, hotel, or tour operator’s policies. We will help you navigate the process and inform you of any applicable fees.'],
            ['question' => 'Do you offer travel insurance?', 'answer' => 'Yes, we offer travel insurance to provide peace of mind during your trips. Our policies cover various aspects, including trip cancellations, medical emergencies, lost baggage, and more. Contact our team to learn about the best insurance options for your trip.'],
            ['question' => 'Can I book a group trip through your agency?', 'answer' => 'Absolutely! We specialize in organizing group travel for family vacations, corporate trips, school tours, and more. Our team will tailor a package to meet the needs of your group and ensure a smooth and enjoyable travel experience.'],
            ['question' => 'How do I find the best deals on flights and hotels?', 'answer' => 'Our website features exclusive deals on flights, hotels, and vacation packages. You can also sign up for our newsletter or follow us on social media for the latest promotions and discounts. Our travel experts are available to assist you in finding the best deals that fit your budget.'],
            ['question' => 'Do you offer vacation packages?', 'answer' => 'Yes, we offer a variety of vacation packages to popular destinations worldwide. These packages can include flights, accommodations, activities, and sometimes even meals. You can browse our packages by destination or contact us for a customized itinerary.'],
            ['question' => 'Are there any age restrictions for booking tours?', 'answer' => 'Most tours do not have age restrictions; however, some tours may have specific age requirements or recommendations for safety and comfort reasons. We recommend checking with our team when booking to ensure the tour is appropriate for all participants.'],
            ['question' => 'How can I check the status of my flight booking?', 'answer' => 'You can check the status of your flight booking through our website by logging into your account, or by contacting our customer support team. You will also receive email notifications from the airline regarding any changes to your flight status.'],
            ['question' => 'Do you provide assistance with visa applications?', 'answer' => 'Yes, we can assist with visa applications for several destinations. Our team can guide you through the process and provide information on the necessary documentation. Some destinations may also offer visa-on-arrival services, which we can help you check for your specific travel plans.'],
            ['question' => 'What is the best time to book my trip for the best prices?', 'answer' => 'The best time to book your trip typically depends on the destination. For international travel, it’s best to book 3–6 months in advance. For popular destinations, booking in the off-season can help you secure better rates. Our team can advise you on the best time to travel for your preferred location.'],
            ['question' => 'Can I book a last-minute trip?', 'answer' => 'Yes, we offer last-minute booking options. While availability may be limited, our travel agents can help you find the best available flights, hotels, and packages for your preferred dates. It’s always worth reaching out, even if you’re planning a trip on short notice!'],
            ['question' => 'What should I do if my luggage is lost or delayed?', 'answer' => 'If your luggage is lost or delayed, immediately contact the airline or transportation provider. They will initiate a claim and assist in tracking your luggage. If you booked through our agency, we will help facilitate communication and offer guidance on how to proceed with compensation claims.'],
            ['question' => 'Do you offer tours for solo travelers?', 'answer' => 'Yes, we offer a variety of tours and travel packages specifically designed for solo travelers. Our experts can recommend group tours or customized itineraries that will allow you to meet other like-minded individuals and explore new destinations safely.'],
            ['question' => 'Can I book transportation, such as airport transfers, through your agency?', 'answer' => 'Yes, we can arrange transportation for you, including airport transfers, private car services, and other local transportation options. Let us know your needs, and we’ll ensure that your transfer arrangements are smooth and reliable.'],
            ['question' => 'What happens if my flight is canceled or delayed?', 'answer' => 'If your flight is canceled or delayed, the airline is typically responsible for rebooking you on the next available flight. Our team will assist you in navigating the situation, including helping you understand your rights and providing support if the delay is significant.'],
            ['question' => 'Do you offer eco-friendly travel options?', 'answer' => 'Yes, we are committed to promoting sustainable travel options. We offer eco-friendly tours, green hotels, and low-carbon transportation options. Contact us if you’d like to learn more about our sustainable travel initiatives.'],
            ['question' => 'What should I do if I need special assistance during my trip?', 'answer' => 'If you need special assistance, such as mobility assistance or medical support, please inform us at the time of booking. We can arrange for accommodations, assistance at the airport, and special services during your trip to ensure your comfort and safety.'],
            ['question' => 'Can I customize my travel itinerary?', 'answer' => 'Yes, we offer fully customizable itineraries. Our travel experts will work with you to design a trip that fits your exact preferences, whether you’re interested in cultural experiences, adventure travel, relaxation, or a combination of activities.'],
            ['question' => 'How can I contact customer support for assistance?', 'answer' => 'You can reach our customer support team by phone, email, or through the contact form on our website. Our team is available during business hours and will be happy to assist you with any questions, concerns, or travel-related needs you may have.'],
        ];
        

        return view('faq.index', compact('faqs'));
    }
}
