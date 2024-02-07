@extends('template.template')
@extends('template.partical.edit')
@section('container')
<link rel="stylesheet" href="{{ asset("css/cart.css") }}">
<meta name="csrf-token" content="{{ csrf_token() }}">

@foreach ($cart as $u)
    @if ($u->is_active)
        <a href="#modaledit_{{ $u->id }}" class="card-wrapper">
            <div class="card">
                <img src="{{ asset($u->photo_path) }}" alt="Product Image">
                <div class="card-content">
                    <span data-id="{{ $u->id }}" class="card-delete">Удалить</span>
                    <div class="card-title">{{ $u->name }}</div>
                    <div class="card-description">{{ $u->description }}</div>
                    <div class="card-price">{{ $u->price }} <span class="card-category">{{ $u->genre }}</span></div>
                </div>
            </div>
        </a>
    @else
        <a href="#modaledit_{{ $u->id }}" class="card-wrapper">
            <div class="card">
                <img src="{{ asset($u->photo_path) }}" alt="Product Image">
                <div class="card-content">
                    <span data-id="{{ $u->id }}" class="card-active">Активировать</span>
                    <span data-id="{{ $u->id }}" class="card-delete">Удалить</span>
                    <div style="margin-top: 10px" class="card-title">{{ $u->name }}</div>
                    <div class="card-description">{{ $u->description }}</div>
                    <div class="card-price">{{ $u->price }} <span class="card-category">{{ $u->genre }}</span></div>
                </div>
            </div>
        </a>
    @endif
    <!-- Уникальный идентификатор модального окна для каждой заявки -->
    <div class="modal-overlay" id="modaledit_{{ $u->id }}">
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <div class="modal-container">
            <div class="modal-header">Редактировать карточки #{{ $u->id }}</div>
            <div class="modal-content">
                <!-- Форма редактирования заявки -->
                <form method="post" action="{{ route('edit.update', ['id' => $u->id]) }}" enctype="multipart/form-data" novalidate>
                    @csrf
                    @method('PUT')
                    <label for="name">Название:</label>
                    <input type="text" id="name" name="name" required value="{{ $u->name }}">
                    <label for="description">Описание:</label>
                    <textarea id="description" name="description" rows="4" required>{{ $u->description }}</textarea>
                    <label for="genre">Жанр:</label>
                    <select id="genre" name="genre" required>
                        <option value="" disabled selected hidden>Выберите жанр</option>
                        <option value="action">Экшен</option>
                        <option value="adventure">Приключения</option>
                        <option value="comedy">Комедия</option>
                    </select>
                    <label for="price">Цена:</label>
                    <input type="text" id="price" name="price" required value="{{ $u->price }}">
                    <label for="image">Картинка:</label>
                    <input type="file" id="photo_path" name="photo_path" accept="image/*" required>
                    <button class="submit-button" type="submit">Изменить</button>
                    <button class="modal-buttonn" type="button"><a href="#" style="color: inherit; text-decoration: none;">Закрыть</a></button>
                </form>
            </div>
        </div>
    </div>
@endforeach


@endsection
<script>
    document.addEventListener('DOMContentLoaded', function () {
        const activateButtons = document.querySelectorAll('.card-active');
        activateButtons.forEach(button => {
            button.addEventListener('click', function (event) {
                event.preventDefault(); // Prevent the default action of the link

                const productId = this.getAttribute('data-id');
                fetch(`/admin/${productId}`, {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/json',
                        'X-CSRF-TOKEN': '{{ csrf_token() }}'
                    }
                })
                    .then(response => response.json())
                    .then(data => {
                        if (data.success) {
                            console.log('Product activated successfully');
                            // Display a success message
                            const successMessage = document.createElement('div');
                            successMessage.classList.add('alert', 'alert-success');
                            successMessage.textContent = 'Активация прошла успешна';
                            document.body.appendChild(successMessage);
                            // Remove the success message after 3 seconds
                            setTimeout(() => {
                                successMessage.remove();
                            }, 3000);
                        } else {
                            console.error('An error occurred while activating the product');
                        }
                    })
                    .catch(error => {
                        console.error('Error sending request:', error);
                    });
            });
        });
    });
</script>


<script>
    document.addEventListener('DOMContentLoaded', function () {
        const deleteButtons = document.querySelectorAll('.card-delete');
        deleteButtons.forEach(button => {
            button.addEventListener('click', function (event) {
                event.preventDefault(); // Предотвращаем стандартное действие ссылки

                const productId = this.getAttribute('data-id');

                fetch(`/admin/${productId}`, {
                    method: 'DELETE',
                    headers: {
                        'Content-Type': 'application/json',
                        'X-CSRF-TOKEN': '{{ csrf_token() }}'
                    }
                })
                    .then(response => {
                        if (response.ok) {
                            const cardWrapper = this.closest('.card-wrapper');
                            cardWrapper.remove(); // Удаляем родительский элемент карточки товара из DOM
                        } else {
                            console.error('Произошла ошибка при удалении товара');
                        }
                    })
                    .catch(error => {
                        console.error('Ошибка при отправке запроса:', error);
                    });
            });
        });
    });
</script>
