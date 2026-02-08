<form action="{{ route('leads.store') }}" method="POST" class="mt-4">
    @csrf
    <input type="hidden" name="source" value="{{ $source ?? 'main_form' }}">
    @if(!empty($service_id))
        <input type="hidden" name="service_id" value="{{ $service_id }}">
    @endif
    <div class="mb-2">
        <label>Имя <input type="text" name="name" required maxlength="255"></label>
    </div>
    <div class="mb-2">
        <label>Телефон <input type="text" name="phone" required maxlength="50"></label>
    </div>
    <div class="mb-2">
        <label>Email <input type="email" name="email"></label>
    </div>
    <div class="mb-2">
        <label>Сообщение <textarea name="message" maxlength="2000"></textarea></label>
    </div>
    <button type="submit">Оставить заявку</button>
</form>
