import React, { useState, useEffect } from 'react';
import { Link, useLocation } from 'react-router-dom';
import '../../style/main_components.scss';

const NavBar = () => {
  const location = useLocation();
  const [activeTab, setActiveTab] = useState('home');

  useEffect(() => {
    // При загрузке страницы проверяем параметр location и устанавливаем активную вкладку
    if (location.pathname === '/profile' || location.pathname === '/profilenodata' || location.pathname === '/profileinputdata') {
      setActiveTab('profile');
    } else if (location.pathname === '/my-olympiads') {
      setActiveTab('my-olympiads');
    } else if (location.pathname === '/olympiad-list') {
      setActiveTab('olympiad-list');
    } else {
      // По умолчанию
      setActiveTab('home');
    }
  }, [location.pathname]);

  const handleTabClick = (tabName) => {
    setActiveTab(tabName);
  };

  return (
    <div className='navbar'>
      <div className='mainnav'>
        <Link to="/" onClick={() => handleTabClick('home')} className={activeTab === 'home' ? 'active' : ''}>
          Главная
        </Link>
        <Link to="/profile" onClick={() => handleTabClick('profile')} className={activeTab === 'profile' ? 'active' : ''}>
          Профиль
        </Link>
        <Link to="/my-olympiads" onClick={() => handleTabClick('my-olympiads')} className={activeTab === 'my-olympiads' ? 'active' : ''}>
          Мои олимпиады
        </Link>
        <Link to="/olympiad-list" onClick={() => handleTabClick('olympiad-list')} className={activeTab === 'olympiad-list' ? 'active' : ''}>
          Список олимпиад
        </Link>
      </div>
      <Link to="/" className='logout'>
        Выход
      </Link>
    </div>
  );
};

export default NavBar;
