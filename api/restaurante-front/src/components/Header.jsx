import { Link } from "react-router-dom";
import logo from "../assets/Logo/logoboemia.png"; // ✅ IMPORTANTE!

const linkStyle = {
  margin: "0 1rem",
  textDecoration: "none",
  color: "#333",
  fontWeight: "bold",
  fontSize: "1.1rem"
};

export default function Header() {
  return (
    <div style={{
      width: "100vw",
      backgroundColor: "#ffffff",
      borderBottom: "1px solid #ddd",
      position: "sticky",
      top: 0,
      zIndex: 1000
    }}>
      <header style={{
        maxWidth: "1200px",
        margin: "0 auto",
        padding: "1rem 2rem",
        display: "flex",
        alignItems: "center",
        justifyContent: "space-between"
      }}>
        {}
        <img
          src={logo}
          alt="Logo do restaurante"
          style={{ height: "80px", objectFit: "contain" }}
        />

        <nav style={{ display: "flex", alignItems: "center" }}>
          <Link to="/cardapio" style={linkStyle}>Cardápio</Link>
          <Link to="/sobre" style={linkStyle}>Sobre</Link>
          <Link to="/contato" style={linkStyle}>Contato</Link>
          <Link to="/localizacao" style={linkStyle}>Localização</Link>
        </nav>
      </header>
    </div>
  );
}
