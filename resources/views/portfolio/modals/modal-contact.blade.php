{{-- resources/views/portfolio/modals/modal-contact.blade.php --}}
<div id="contactModal"
     style="position:fixed;inset:0;background:rgba(0,0,0,0.55);backdrop-filter:blur(4px);
            display:none;align-items:center;justify-content:center;z-index:9999;transition:0.3s;">

    <div id="contactModalBox"
         style="width:720px;background:#0f172a;border:1px solid #243045;border-radius:16px;
                padding:28px;color:white;transform:scale(0.92);transition:0.25s;">

        <h3 style="font-size:1.4rem;margin-bottom:16px;">
            @lang('portfolio.contact_form_title')
        </h3>

        {{-- ВАЖНО: добавлены data-url и data-token --}}
        <form id="contactForm"
              data-url="{{ route('contact.send', ['locale' => $locale]) }}"
              data-token="{{ csrf_token() }}">

            @csrf

            {{-- ИМЯ --}}
            <label>@lang('portfolio.contact_form_name')</label>
            <input name="name" maxlength="50" required
                   style="width:100%;margin:6px 0 12px;padding:12px;border-radius:10px;
                          background:#0d1322;border:1px solid #243045;color:white;">

            {{-- EMAIL --}}
            <label>@lang('portfolio.contact_form_email')</label>
            <input name="email" type="email" maxlength="50" required
                   style="width:100%;margin:6px 0 12px;padding:12px;border-radius:10px;
                          background:#0d1322;border:1px solid #243045;color:white;">

            {{-- PHONE --}}
            <label>@lang('portfolio.contact_form_phone')</label>
            <input name="phone"
                   id="contactPhone"
                   maxlength="15"
                   required
                   placeholder="+49010000001"
                   style="width:100%;margin:6px 0 12px;padding:12px;border-radius:10px;
                          background:#0d1322;border:1px solid #243045;color:white;
                          font-family:inherit;">

            {{-- ТЕМА --}}
            <label>@lang('portfolio.contact_form_topic')</label>
            <select name="topic" required
                    style="width:100%;margin:6px 0 12px;padding:12px;border-radius:10px;
                           background:#0d1322;border:1px solid #243045;color:white;">

                <option value="">@lang('portfolio.contact_form_topic')</option>
                <option value="landing">@lang('portfolio.contact_topic_landing')</option>
                <option value="portfolio">@lang('portfolio.contact_topic_portfolio')</option>
                <option value="corporate">@lang('portfolio.contact_topic_corporate')</option>
                <option value="shop">@lang('portfolio.contact_topic_shop')</option>
                <option value="redesign">@lang('portfolio.contact_topic_redesign')</option>
                <option value="other">Другое</option>
            </select>

            {{-- СООБЩЕНИЕ --}}
            <label>@lang('portfolio.contact_form_message')</label>
            <textarea name="message" maxlength="250" required
                      style="width:100%;height:150px;margin-top:6px;padding:12px;background:#0d1322;
                             border:1px solid #243045;color:white;border-radius:10px;"></textarea>

            <input type="text" name="hp_secret" id="hp_secret" style="display:none;">


            {{-- КНОПКА ОТПРАВИТЬ --}}
            <button type="submit"
                    style="margin-top:16px;width:100%;padding:12px;border-radius:12px;
                           background:linear-gradient(90deg,#3b82f6,#6366f1);color:white;border:none;
                           font-size:1.05rem;cursor:pointer;">
                @lang('portfolio.contact_form_send')
            </button>
        </form>

        {{-- Закрыть --}}
        <button id="contactCloseBtn"
                style="margin-top:12px;width:100%;padding:10px;border:none;background:#1e293b;
                       border-radius:10px;color:white;cursor:pointer;">
            @lang('portfolio.modal_close')
        </button>

    </div>
</div>
