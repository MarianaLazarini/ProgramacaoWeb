import React from 'react';
import { Link, Navigate, useNavigate } from 'react-router-dom';
import { useLogin } from '../../context/ContextProvider';
import axiosClient from '../../axiosClient';

export default function DefaultLayout({ children }) {
  const navigate = useNavigate();
  const { token, _setUser, _setToken, user } = useLogin();

  if (!token) {
    return <Navigate to="/login" />;
  }

  const onLogout = (e) => {
    e.preventDefault();
    axiosClient.post('/logout', { email: user.email })
      .then(() => {
        _setUser({});
        _setToken(null);
        navigate('/login');
      })
      .catch((error) => {
        console.log(error);
      });
  };

  return (
    <div id="defaultLayout">
      <aside>
        <Link to="/dashboard">Dashboard</Link>
        <Link to="/user/index">Usuários</Link>
        <Link to="/produtos">Produtos</Link>
        <Link to="/categorias">Categorias</Link>
        <Link to="/menus">Menus</Link>
        <Link to="/avaliacoes">Avaliações</Link>
        <Link to="/horarios">Horários</Link>
      </aside>
      <div className="content">
        <header>
          <div className="header">
            Painel Administrativo - Restaurante Boemia
          </div>
          <div>
            {user.name} &nbsp;&nbsp;
            <a onClick={onLogout} className="btn-logout" href="#">
              Logout
            </a>
          </div>
        </header>
        <main>{children}</main>
      </div>
    </div>
  );
}
