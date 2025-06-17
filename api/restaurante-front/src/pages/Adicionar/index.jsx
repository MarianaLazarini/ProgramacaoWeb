import { useState } from "react";
//import axios from "axiosClient";

export default function Adicionar() {
  const [form, setForm] = useState({
    nome: "",
    descricao: "",
    preco: ""
  });

  const handleChange = (e) => {
    setForm({ ...form, [e.target.name]: e.target.value });
  };

  const handleSubmit = (e) => {
    e.preventDefault();

    axios.post("http://localhost:8000/api/produtos", form)
      .then(() => {
        alert("Prato cadastrado com sucesso!");
        setForm({ nome: "", descricao: "", preco: "" });
      })
      .catch((err) => {
        console.error("Erro ao cadastrar:", err);
        alert("Erro ao cadastrar prato.");
      });
  };

  return (
    <section style={{
      padding: "2rem",
      maxWidth: "600px",
      margin: "0 auto",
      fontFamily: "'Segoe UI', sans-serif"
    }}>
      <h1>Adicionar Prato</h1>
      <form onSubmit={handleSubmit}>
        <div style={{ marginBottom: "1rem" }}>
          <label>Nome:</label><br />
          <input
            type="text"
            name="nome"
            value={form.nome}
            onChange={handleChange}
            required
            style={{ width: "100%", padding: "0.5rem" }}
          />
        </div>

        <div style={{ marginBottom: "1rem" }}>
          <label>Descrição:</label><br />
          <textarea
            name="descricao"
            value={form.descricao}
            onChange={handleChange}
            required
            style={{ width: "100%", padding: "0.5rem" }}
          />
        </div>

        <div style={{ marginBottom: "1rem" }}>
          <label>Preço:</label><br />
          <input
            type="number"
            step="0.01"
            name="preco"
            value={form.preco}
            onChange={handleChange}
            required
            style={{ width: "100%", padding: "0.5rem" }}
          />
        </div>

        <button type="submit" style={{
          backgroundColor: "#dc2626",
          color: "#fff",
          padding: "0.5rem 1rem",
          border: "none",
          borderRadius: "5px",
          cursor: "pointer"
        }}>
          Cadastrar
        </button>
      </form>
    </section>
  );
}
