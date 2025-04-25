import { BrowserRouter as Router, Routes, Route } from "react-router-dom";
import Header from "./components/Header";
import Cardapio from "./pages/Cardapio";
import Sobre from "./pages/Sobre";
import Contato from "./pages/Contato";
import Localizacao from "./pages/Localizacao";

export default function App() {
  return (
    <Router>
      <Header /> {/* Vai aparecer em TODAS as páginas */}
      <Routes>
        <Route path="/cardapio" element={<Cardapio />} />
        <Route path="/sobre" element={<Sobre />} />
        <Route path="/contato" element={<Contato />} />
        <Route path="/localizacao" element={<Localizacao />} />
      </Routes>
    </Router>
  );
}
