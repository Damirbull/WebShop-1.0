<div class="modal-overlay" id="modalOverlay">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <div class="modal-container">
        <div class="modal-header">Добавить Товар</div>
        <div class="modal-content">
            <form method="post" action="{{ route('cart') }}" enctype="multipart/form-data" novalidate>
                @csrf
                <label for="name">Название:</label>
                <input type="text" id="name" name="name" required>

                <label for="description">Описание:</label>
                <textarea id="description" name="description" rows="4" required></textarea>

                <label for="genre">Жанр:</label>
                <select id="genre" name="genre" required>
                    <option value="" disabled selected hidden>Выберите жанр</option>
                    <option value="action">Экшен</option>
                    <option value="adventure">Приключения</option>
                    <option value="comedy">Комедия</option>
                </select>

                <label for="price">Цена:</label>
                <input type="text" id="price" name="price" required>

                <label for="image">Картинка:</label>
                <input type="file" id="image" name="image" accept="image/*" required>
                <button class="submit-button" type="submit">Отправить</button>
                <button class="modal-buttonn" type="button"><a href="#" style="color: inherit; text-decoration: none;">Закрыть</a></button>
            </form>
        </div>
    </div>
</div>

<style>
    body {
        font-family: Arial, sans-serif;


    }

    .modal-overlay:target {
        display: flex;
        opacity: 1;
        visibility: visible;
        pointer-events: auto;
    }

    .modal-overlay {
        display: none;
        opacity: 0;
        visibility: hidden;
        position: fixed;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        background-color: rgba(0, 0, 0, 0.5);
        justify-content: center;
        align-items: center;
        z-index: 1;
        transition: opacity 0.3s ease-out;
        pointer-events: none;
    }

    .modal-container {
        background-color: #ffffff;
        border-radius: 10px;
        box-shadow: 0 0 10px rgba(0, 0, 0, 0.2);
        padding: 20px;
        width: 400px;

        text-align: center;
        animation: slideIn 0.3s ease-out;
    }

    .modal-header {
        font-size: 18px;
        font-weight: bold;
        margin-bottom: 15px;
    }

    .modal-content {
        margin-bottom: 15px;
    }

    .modal-buttonn {
        padding: 10px 20px;
        background-color: #3498db;
        color: #ffffff;
        border: none;
        border-radius: 5px;
        font-size: 16px;
        cursor: pointer;
        text-decoration: none; /* Добавленный стиль для убирания подчеркивания */
    }

    .modal-buttonn:hover {
        background-color: #2980b9;
    }

    @keyframes slideIn {
        from {
            transform: translateY(-50px);
            opacity: 0;
        }
        to {
            transform: translateY(0);
            opacity: 1;
        }
    }
    form {
        display: flex;
        flex-direction: column;
        align-items: center;
        max-width: 500px; /* Adjust the maximum width as needed */
        margin: 0 auto; /* Center the form horizontally */
    }

    label {
        margin-top: 10px;
        font-size: 16px;
    }

    input,
    textarea,
    select,
    button {
        width: 100%;
        padding: 8px;
        margin: 8px 0;
        box-sizing: border-box;
        border: 1px solid #ccc;
        border-radius: 4px;
    }

    select {
        appearance: none;
        -webkit-appearance: none;
        -moz-appearance: none;
        background-image: url("data:image/svg+xml,%3Csvg fill='black' height='24' width='24' xmlns='http://www.w3.org/2000/svg'%3E%3Cpath d='M7 10l5 5 5-5z'/%3E%3C/svg%3E");
        background-position: right 10px top 50%;
        background-repeat: no-repeat;
        background-size: 16px;
        padding-right: 30px;
    }

    button.modal-buttonn {
        width: auto;
    }
    .submit-button {

        background-color: #3498db;
        color: #ffffff;
        margin-top: 10px;
        padding: 12px 20px;
        font-size: 16px;
        cursor: pointer;
        text-decoration: none;
        transition: background-color 0.3s ease;
        border: none;
        border-radius: 5px;
        width: auto;
        height: auto;
    }
</style>
