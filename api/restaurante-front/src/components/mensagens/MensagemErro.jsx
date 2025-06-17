import React from "react";

export default function MensagemErro({ error, mensagem }) {
  if (!error) return null;

  return (
    <div className="invalid-feedback" style={{ display: "block" }}>
      {mensagem}
    </div>
  );
}
