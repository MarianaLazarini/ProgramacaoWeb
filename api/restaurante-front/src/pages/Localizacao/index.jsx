export default function Localizacao() {
  return (
    <section style={{
      padding: "13rem",
      maxWidth: "900px",
      margin: "0 auto",
      fontFamily: "'Segoe UI', sans-serif",
      lineHeight: "1.6"
    }}>
      <h1>Localização</h1>
      <p>Estamos localizados em:</p>
      <p>Av. Nove de Julho, 1720 - Birigui (SP)</p>
      <a
        href="https://maps.app.goo.gl/8oKn3aahH7ESNs1e6"
        target="_blank"
        rel="noopener noreferrer"
        style={{
          display: "inline-block",
          marginTop: "1rem",
          padding: "1rem 1rem",
          backgroundColor: "#dc2626",
          color: "#fff",
          borderRadius: "5px",
          textDecoration: "none"
        }}
      >
        Ver no Google Maps
      </a>
    </section>
  );
}
