import { BrowserRouter as Router, Routes, Route } from "react-router-dom";
import Cardapio from "./pages/Cardapio";
import Sobre from "./pages/Sobre";
import Contato from "./pages/Contato";
import Localizacao from "./pages/Localizacao";
import Home from "./pages/Home"; // 🆕 página inicial
import Header from "./components/Header";

export default function App() {
  return (
    <Router>
      <Header />
      <Routes>
        <Route path="/" element={<Home />} /> {/* 🆕 rota inicial */}
        <Route path="/cardapio" element={<Cardapio />} />
        <Route path="/sobre" element={<Sobre />} />
        <Route path="/contato" element={<Contato />} />
        <Route path="/localizacao" element={<Localizacao />} />
      </Routes>
    </Router>
  );
}
