<script>
document.addEventListener('DOMContentLoaded', () => {

    const modal      = document.getElementById('contactModal');
    const modalBox   = document.getElementById('contactModalBox');
    const openBtn    = document.getElementById('contact-open-btn');
    const closeBtn   = document.getElementById('contactCloseBtn');
    const form       = document.getElementById('contactForm');

    function open() {
        modal.style.display = 'flex';
        setTimeout(() => modalBox.style.transform = 'scale(1)', 20);
    }

    function close() {
        modalBox.style.transform = 'scale(0.92)';
        setTimeout(() => modal.style.display = 'none', 150);
    }

    openBtn.addEventListener('click', open);
    closeBtn.addEventListener('click', close);

    modal.addEventListener('click', e => {
        if (!modalBox.contains(e.target)) close();
    });

    document.addEventListener('keydown', e => {
        if (e.key === 'Escape') close();
    });

    form.addEventListener('submit', async (e) => {
        e.preventDefault();

        const payload = {
            name: form.name.value.trim(),
            email: form.email.value.trim(),
            phone: form.phone.value.trim(),
            topic: form.topic.value,
            message: form.message.value.trim(),
        };

        let res = await fetch("{{ route('contact.send', ['locale' => $locale]) }}", {
            method: "POST",
            headers: {
                "Content-Type": "application/json",
                "X-CSRF-TOKEN": "{{ csrf_token() }}"
            },
            body: JSON.stringify(payload)
        });

        let data = await res.json();

        if (data.ok) {
            showAlert("@lang('portfolio.alert_success')", "success");
            close();
            form.reset();
        } else {
            showAlert("@lang('portfolio.alert_error')", "error");
        }
    });
});
</script>

<script>
document.addEventListener('DOMContentLoaded', () => {

    const phoneInput = document.getElementById('contactPhone');

    // Разрешаем только + и цифры
    phoneInput.addEventListener('input', () => {

        // Удаляем все символы кроме + и цифр
        let cleaned = phoneInput.value.replace(/[^0-9+]/g, '');

        // + можно только один раз и только в начале
        cleaned = cleaned
            .replace(/(?!^)\+/g, '')   // убираем все "+" кроме первого
            .replace(/(.).*\+/, '$1'); // если + не в начале — удаляем

        phoneInput.value = cleaned;
    });

});
</script>


