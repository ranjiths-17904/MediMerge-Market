function sendReceiptToWhatsApp() {
    const phoneNumber = "YOUR_PHONE_NUMBER"; // Enter the user's phone number with country code
    const message = encodeURIComponent(`Order ID: ${localStorage.getItem('orderId')}\nTotal: ${localStorage.getItem('totalAmount')}\nThank you for your purchase!`);
    const whatsappUrl = `https://wa.me/${phoneNumber}?text=${message}`;
    window.open(whatsappUrl, '_blank');
}
