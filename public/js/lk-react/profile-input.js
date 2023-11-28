import React, { useState } from 'react';
import { Link } from 'react-router-dom';
import '../../style/profileBlade.scss';
import '../../style/ProfileForms.scss';
import Header from '../header';
import Footer from '../footer';
import Navbar from './navbar';

const ProfileInput = () => {
  // Локальное состояние для хранения значений полей и активности кнопки
  const [formData, setFormData] = useState({
    surname: '',
    name: '',
    patronymic: '',
    birthDate: '',
    // Значение по умолчанию для выпадающего списка
    school: '',
    grade: '',
    participationClass: '',
  });

  // Обновление состояния при изменении значений полей
  const handleInputChange = (e) => {
    const { name, value } = e.target;
    setFormData({
      ...formData,
      [name]: value,
    });
  };

  const isFormValid = () => {
    const {
      surname,
      name,
      patronymic,
      birthDate,
      school,
      grade,
      participationClass,
    } = formData;

    return (
      surname.trim() !== '' &&
      name.trim() !== '' &&
      patronymic.trim() !== '' &&
      birthDate.trim() !== '' &&
      school.trim() !== '' &&
      grade.trim() !== '' &&
      participationClass.trim() !== ''
    );
  };
  // Проверка наличия данных в полях для активации кнопки
  return (
    <div className='profile_main'>
      <Header />
      <div className='profile'>
        <Navbar />
        <div className='section animate__animated animate__fadeIn'>
          <div className='title'>
            <Link to="/profilenodata" className='small_button_back'>
              <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 20 20" className='arrow_gray'>
                <path d="M16.6001 9.09992L16.6001 10.7666L6.6001 10.7666L11.1834 15.3499L10.0001 16.5333L3.4001 9.93325L10.0001 3.33325L11.1834 4.51658L6.6001 9.09992L16.6001 9.09992Z" fill="#C0C0C0"/>
              </svg>
            </Link>
            <h4>Персональные данные</h4>
          </div>

          <form className='mainform_profile'>
            <div>
              <input
                name="surname"
                onChange={handleInputChange}
                className="form-control"
                id="surnameInput"
                placeholder="Фамилия"

              />
              <input
                name="name"
                onChange={handleInputChange}
                className="form-control"
                id="nameInput"
                placeholder="Имя"
              />
               <input
                name="patronymic"
                className="form-control"
                id="patronymic"
                placeholder="Отчество"
                onChange={handleInputChange}
              />
               <input
                name="birthDate"
                className="form-control"
                id="birthDate "
                placeholder="Дата рождения"
                onChange={handleInputChange}
              />
            </div>

            <div>
              <select class="form-select" aria-label="Default select example">
              <option selected>Астрахань</option>
              <option value="1">Ахтубинский район</option>
              <option value="2">Володарский район</option>
              <option value="3">Енотаевский район</option>
              <option value="3">Икрянинский район</option>
              <option value="3">Камызякский район</option>
              <option value="3">Красноярский район</option>
              <option value="3">Лиманский район</option>
              <option value="3">Наримановский район</option>
              <option value="3">Приволжский район</option>
              <option value="3">Черноярский район</option>

            </select>
              <input
                name="school"
                className="form-control"
                id="school"
                placeholder="Школа"
                onChange={handleInputChange}
              />
              <input
                name="grade"
                className="form-control"
                id="grade"
                placeholder="Класс обучения"
                onChange={handleInputChange}
              />
              <input
                name="participationClass"
                className="form-control"
                id="participationClass"
                placeholder="Класс участия в олимпидае"
                onChange={handleInputChange}
              />
            </div>

            <div className='btnline'>
            <Link to='/profilenodata' className='btn btn-secondary'>Отмена</Link>
            <Link to='/profilenodata' className={`btn btn-primary ${isFormValid() ? '' : 'disabled'}`}>Сохранить</Link>
            </div>
          </form>
        </div>
        <div className='Column'></div>
      </div>
      <Footer />
    </div>
  );
};

export default ProfileInput;
