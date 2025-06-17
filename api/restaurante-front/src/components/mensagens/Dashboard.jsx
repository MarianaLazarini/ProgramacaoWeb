// src/views/Dashboard.jsx
import React from 'react';

const Dashboard = () => {
  return (
    <div className="dashboard">
      <h1>Bem-vindo ao Painel Administrativo</h1>
      <p>Use o menu lateral para:</p>
      <ul>
        <li>Visualizar o cardápio</li>
        <li>Adicionar novos pratos</li>
        <li>Gerenciar usuários</li>
        <li>Ajustar horários de funcionamento</li>
        <li>Visualizar avaliações dos clientes</li>
      </ul>
    </div>
  );
};

export default Dashboard;
