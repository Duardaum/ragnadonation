ALTER TABLE clientes ADD CONSTRAINT fk_codcidade FOREIGN KEY (codcidade) REFERENCES cidades(codcidade);
ALTER TABLE doacao ADD CONSTRAINT fk_codcliente FOREIGN KEY(codcliente) REFERENCES clientes(codcliente);
ALTER TABLE conta ADD CONSTRAINT fk_coddoacao FOREIGN KEY(coddoacao) REFERENCES doacao(coddoacao);
ALTER TABLE cidades ADD CONSTRAINT fk_uf FOREIGN KEY(uf) REFERENCES estados(uf);