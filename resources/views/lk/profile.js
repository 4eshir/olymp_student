import React from 'react';
import { Link } from 'react-router-dom';
import '../../style/profile.scss';
//import Header from '../header';
//import Footer from '../footer';
import Navbar from './navbar';

const profile = () => {

  return (
    <div className='profile_main'>
        <Header/>
        <div className='profile'>
          <Navbar/>
          <div className='section animate__animated animate__fadeIn'>

            <div className='name_section'>
              <div className='name'>
                <h3>Имя Фамилия Отчество</h3>
                <p>5 января 2009г.</p>
              </div>
              <Link to="/">
                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" className="edit_icon_blue">
                <path d="M9.243 18.996H21V20.996H3V16.754L12.9 6.85403L17.142 11.097L9.242 18.997L9.243 18.996ZM14.313 5.44003L16.435 3.31903C16.6225 3.13156 16.8768 3.02625 17.142 3.02625C17.4072 3.02625 17.6615 3.13156 17.849 3.31903L20.678 6.14703C20.8655 6.33456 20.9708 6.58887 20.9708 6.85403C20.9708 7.1192 20.8655 7.3735 20.678 7.56103L18.556 9.68303L14.314 5.44003H14.313Z" fill="#024566" fill-opacity="0.1"/>
                </svg>
              </Link>
            </div>

            <div className='contacts'>
              <div className='title'>
                <h4>Контакты</h4>
                <Link to="/">
                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" className="edit_icon_gray">
                <path d="M9.243 18.996H21V20.996H3V16.754L12.9 6.85403L17.142 11.097L9.242 18.997L9.243 18.996ZM14.313 5.44003L16.435 3.31903C16.6225 3.13156 16.8768 3.02625 17.142 3.02625C17.4072 3.02625 17.6615 3.13156 17.849 3.31903L20.678 6.14703C20.8655 6.33456 20.9708 6.58887 20.9708 6.85403C20.9708 7.1192 20.8655 7.3735 20.678 7.56103L18.556 9.68303L14.314 5.44003H14.313Z" fill="#383C3F" fill-opacity="0.1"/>
                </svg>
                </Link>
              </div>

              <div className='info'>
              <div className='tel'>
                <span>Номер телефона</span>
                <p>+7 934 543 22 34</p>
              </div>
              <div className='email'>
                <span>Email</span>
                <p>sergee.arseny15@gmail.com</p>
              </div>

              </div>
            </div>

            <div className='personaldata'>

            <div className='title'>
                <h4>Персональные данные</h4>
                <Link to="/">
                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" className="edit_icon_gray">
                <path d="M9.243 18.996H21V20.996H3V16.754L12.9 6.85403L17.142 11.097L9.242 18.997L9.243 18.996ZM14.313 5.44003L16.435 3.31903C16.6225 3.13156 16.8768 3.02625 17.142 3.02625C17.4072 3.02625 17.6615 3.13156 17.849 3.31903L20.678 6.14703C20.8655 6.33456 20.9708 6.58887 20.9708 6.85403C20.9708 7.1192 20.8655 7.3735 20.678 7.56103L18.556 9.68303L14.314 5.44003H14.313Z" fill="#383C3F" fill-opacity="0.1"/>
                </svg>
                </Link>
              </div>

              <div className='info'>
                  <div className='raion'>
                    <span>Район</span>
                    <p>Лиманский</p>
                  </div>

                  <div className='school'>
                    <span>Школа</span>
                    <p>МКОУ "ЛСОШ №2"</p>
                  </div>

                  <div className='grade_real'>
                    <span>Класс обучения</span>
                    <p>10</p>
                  </div>

                  <div className='grade'>
                    <span>Класс участия в олимпиаде</span>
                    <p>11</p>
                  </div>

              </div>
            </div>
          </div>
          <div className='Column'></div>
        </div>
      <Footer />

    </div>
  );
};

export default profile;
