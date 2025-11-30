<script>
document.addEventListener("DOMContentLoaded", () => {

    const modal      = document.getElementById('contactModal');
    const modalBox   = document.getElementById('contactModalBox');
    const openBtn    = document.getElementById('contact-open-btn');
    const closeBtn   = document.getElementById('contactCloseBtn');
    const form       = document.getElementById('contactForm');
    const phoneInput = document.getElementById('contactPhone');
    const messageInput = form?.querySelector("[name='message']");

    if (!modal || !modalBox || !form) return;


    /* ------------------------------------------------------------
     * ОТКРЫТЬ / ЗАКРЫТЬ
     * ------------------------------------------------------------ */
    function openModal() {
        modal.style.display = 'flex';
        setTimeout(() => modalBox.style.transform = 'scale(1)', 20);
    }

    function closeModal() {
        modalBox.style.transform = 'scale(0.92)';
        setTimeout(() => modal.style.display = 'none', 200);
    }

    openBtn?.addEventListener('click', openModal);
    closeBtn?.addEventListener('click', closeModal);

    modal.addEventListener('click', e => {
        if (!modalBox.contains(e.target)) closeModal();
    });

    document.addEventListener('keydown', e => {
        if (e.key === 'Escape') closeModal();
    });


    /* ------------------------------------------------------------
     * УТИЛИТЫ: очистка / скролл
     * ------------------------------------------------------------ */
    function clearAllErrors() {
        document.querySelectorAll(".input-error").forEach(el => el.classList.remove("input-error"));
        document.querySelectorAll(".input-success").forEach(el => el.classList.remove("input-success"));
        document.querySelectorAll(".error-container").forEach(box => box.innerHTML = "");
    }

    function scrollToField(field) {
        const group = document.querySelector(`[data-field="${field}"]`);
        if (!group) return;
        group.scrollIntoView({ behavior: "smooth", block: "center" });
    }


    /* ------------------------------------------------------------
     * ПОКАЗ ОШИБКИ / УСПЕХА
     * ------------------------------------------------------------ */
    function showFieldError(field, message) {
        const group = document.querySelector(`[data-field="${field}"]`);
        if (!group) return;

        const input    = group.querySelector("input, textarea, select");
        const errorBox = group.querySelector(".error-container");

        if (!input || !errorBox) return;

        input.classList.remove("input-success");
        input.classList.add("input-error");

        errorBox.innerHTML = `
            <div class="error-bubble">${message}</div>
        `;
    }

    function showFieldSuccess(field) {
        const group = document.querySelector(`[data-field="${field}"]`);
        if (!group) return;

        const input = group.querySelector("input, textarea, select");
        if (!input) return;

        if (input.value.trim().length > 0) {
            input.classList.add("input-success");
        } else {
            input.classList.remove("input-success");
        }
    }


    /* ------------------------------------------------------------
     * САНИТИЗАЦИЯ ТЕКСТА
     * ------------------------------------------------------------ */
    function sanitizeText(value) {
        if (!value) return "";

        // Удалить emoji
        value = value.replace(/[\p{Extended_Pictographic}]/gu, "");

        // Экранируем HTML
        value = value
            .replace(/</g, "&lt;")
            .replace(/>/g, "&gt;");

        // Markdown → plain text
        value = value.replace(/[*_`#>-]/g, "");

        // Табуляции → пробел
        value = value.replace(/\t+/g, " ");

        // Много пробелов → один
        value = value.replace(/ {2,}/g, " ");

        // Переносы строк нормализуем
        value = value.replace(/\r\n|\n\r|\r/g, "\n");
        value = value.replace(/\n{3,}/g, "\n\n");

        // Удаляем управляющие символы
        value = value.replace(/[\u0000-\u001F\u007F]/g, "");

        // ВАЖНО: не трогаем пробел в конце строки,
        // чтобы пользователь мог его вводить
        return value;
    }

    // Авто-санитизация всех текстовых полей
    document.querySelectorAll("#contactForm input[name], #contactForm textarea[name]")
        .forEach(input => {

            input.addEventListener("input", () => {
                const cursor = input.selectionStart;

                // Прогоняем через защиту
                const clean = sanitizeText(input.value);

                // Если текст изменился — записываем
                if (clean !== input.value) {
                    input.value = clean;
                    input.selectionEnd = cursor;
                }
            });
        });


    /* Live очистка для message */
    if (messageInput) {
        messageInput.addEventListener("input", () => {
            const pos = messageInput.selectionStart;
            messageInput.value = sanitizeText(messageInput.value);
            messageInput.selectionEnd = pos;
        });
    }


    /* ------------------------------------------------------------
     * ВАЛИДАЦИЯ
     * ------------------------------------------------------------ */
    const emailRe = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
    const phoneRe = /^\+[0-9]{7,15}$/;

    function validateField(field, value) {
        value = (value || "").trim();

        switch (field) {
            case "name":
                if (!value) return "@lang('portfolio.err_name_required')";
                return null;

            case "email":
                if (!emailRe.test(value)) return "@lang('portfolio.err_email_invalid')";
                return null;

            case "phone":
                if (!phoneRe.test(value)) return "@lang('portfolio.err_phone_invalid')";
                return null;

            case "topic":
                if (!value) return "@lang('portfolio.err_topic_required')";
                return null;

            case "message":
                if (!value) return "@lang('portfolio.err_message_required')";
                return null;
        }

        return null;
    }

    function validateAll(payload) {
        let firstInvalid = null;

        ["name", "email", "phone", "topic", "message"].forEach(field => {
            const error = validateField(field, payload[field]);
            const group = document.querySelector(`[data-field="${field}"]`);
            if (!group) return;

            const input    = group.querySelector("input, textarea, select");
            const errorBox = group.querySelector(".error-container");

            input.classList.remove("input-error", "input-success");
            errorBox.innerHTML = "";

            if (error) {
                showFieldError(field, error);
                if (!firstInvalid) firstInvalid = field;
            } else {
                showFieldSuccess(field);
            }
        });

        return firstInvalid;
    }


    /* ------------------------------------------------------------
     * LIVE-ВАЛИДАЦИЯ + СЧЁТЧИКИ
     * ------------------------------------------------------------ */
    function updateCharCounter(input) {
        const group   = input.closest(".form-group");
        const counter = group?.querySelector(".char-counter");
        if (!counter) return;

        counter.innerHTML = `<strong>${input.value.length}</strong> / ${input.maxLength}`;
    }

    document.querySelectorAll(".input-field").forEach(input => {
        updateCharCounter(input);

        input.addEventListener("input", () => {
            const err = validateField(input.name, input.value);
            const group = input.closest(".form-group");
            const box = group?.querySelector(".error-container");

            input.classList.remove("input-error", "input-success");
            if (box) box.innerHTML = "";

            if (err) {
                showFieldError(input.name, err);
            } else {
                showFieldSuccess(input.name);
            }

            updateCharCounter(input);
        });
    });


    /* ------------------------------------------------------------
     * НОРМАЛИЗАЦИЯ ТЕЛЕФОНА
     * ------------------------------------------------------------ */
    phoneInput?.addEventListener("input", () => {
        let cleaned = phoneInput.value.replace(/[^0-9+]/g, '');

        cleaned = cleaned
            .replace(/(?!^)\+/g, '')
            .replace(/(.).*\+/, '$1');

        phoneInput.value = cleaned;
    });


    /* ------------------------------------------------------------
     * ОТПРАВКА
     * ------------------------------------------------------------ */
    form.addEventListener("submit", async (e) => {
        e.preventDefault();
        clearAllErrors();

        const payload = {
            // здесь мы уже ОБРЕЗАЕМ пробелы по краям вручную
            name: sanitizeText(form.name.value.trim()),
            email: sanitizeText(form.email.value.trim()),
            phone: sanitizeText(form.phone.value.trim()),
            topic: sanitizeText(form.topic.value.trim()),
            message: sanitizeText(form.message.value.trim()),
            hp_secret: form.hp_secret.value,
        };


        // 1) клиентская валидация
        const firstInvalid = validateAll(payload);
        if (firstInvalid) {
            scrollToField(firstInvalid);
            return;
        }

        // 2) отправка
        const response = await fetch(form.dataset.url, {
            method: "POST",
            headers: {
                "Content-Type": "application/json",
                "X-CSRF-TOKEN": form.dataset.token
            },
            body: JSON.stringify(payload)
        });

        // 3) Laravel validation (422)
        if (response.status === 422) {
            const json = await response.json();
            let firstBackend = null;

            for (let field in json.errors) {
                if (!firstBackend) firstBackend = field;
                showFieldError(field, json.errors[field][0]);
            }

            if (firstBackend) scrollToField(firstBackend);

            showAlert("@lang('portfolio.alert_error')", "error");
            return;
        }

        const data = await response.json();

        // 4) success
        if (data.ok) {
            showAlert("@lang('portfolio.alert_success')", "success");
            form.reset();
            clearAllErrors();
            document.querySelectorAll(".input-field").forEach(input => updateCharCounter(input));
            closeModal();
        } else {
            showAlert("@lang('portfolio.alert_error')", "error");
        }
    });

});
</script>
