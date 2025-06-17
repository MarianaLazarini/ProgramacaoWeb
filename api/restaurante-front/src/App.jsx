import { Routes, Route } from "react-router-dom";
import Cardapio from "./pages/Cardapio";
import Sobre from "./pages/Sobre";
import Contato from "./pages/Contato";
import Localizacao from "./pages/Localizacao";
import Home from "./pages/Home";
import Header from "./components/Header";
import Adicionar from "./pages/Adicionar";
import Login from "./views/login/Login";
import DefaultLayout from "./components/mensagens/DefaultLayout";
import Dashboard from "./components/mensagens/DefaultLayout"; // ou onde estiver

export default function App() {
  return (
    <>
      <Header />
      <Routes>
        <Route path="/" element={<Home />} />
        <Route path="/cardapio" element={<Cardapio />} />
        <Route path="/sobre" element={<Sobre />} />
        <Route path="/contato" element={<Contato />} />
        <Route path="/localizacao" element={<Localizacao />} />
        <Route path="/adicionar" element={<Adicionar />} />
        <Route path="/login" element={<Login />} />
        <Route path="/dashboard" element={
          <DefaultLayout>
            <Dashboard />
          </DefaultLayout>
        } />
      </Routes>
    </>
  );
}
