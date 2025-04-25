import { useEffect, useState } from "react";
import axios from "axios";

export default function Cardapio() {
  const [pratos, setPratos] = useState([]);

  useEffect(() => {
    axios.get("http://localhost:8000/api/produtos")
      .then(res => setPratos(res.data))
      .catch(err => console.error("Erro ao carregar cardápio:", err));
  }, []);

  return (
    <section style={{ padding: "2rem", maxWidth: "1000px", margin: "0 auto" }}>
      <h1>Cardápio</h1>
      {pratos.length === 0 ? (
        <p>Nenhum produto cadastrado.</p>
      ) : (
        pratos.map(prato => (
          <div key={prato.id} style={{ marginBottom: "1.5rem", borderBottom: "1px solid #ccc" }}>
            <h2>{prato.nome}</h2>
            <p>{prato.descricao}</p>
            <p><strong>R$ {Number(prato.preco).toFixed(2)}</strong></p>
            {prato.imagem && (
              <img src={prato.imagem} alt={prato.nome} width="150" />
            )}
          </div>
        ))
      )}
    </section>
  );
}
