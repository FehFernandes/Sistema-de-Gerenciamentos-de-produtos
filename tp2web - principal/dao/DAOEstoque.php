<?php
class DAOEstoque
{
    public function inclui(Estoque $estoque)
    {
        $sql = 'INSERT INTO estoque (idFornecedor, nome, preco, quantidade) VALUES (?, ?, ?, ?)';
        $pst = Conexao::getPreparedStatement($sql);
        $pst->bindValue(1, $estoque->getIdFornecedor());
        $pst->bindValue(2, $estoque->getNome());
        $pst->bindValue(3, $estoque->getPreco());
        $pst->bindValue(4, $estoque->getQuantidade());

        try {
            $pst->execute();
            return true;
        } catch (PDOException $e) {
            // Registre a mensagem de erro em logs em produção
            echo "Erro ao incluir no estoque: " . $e->getMessage();
            return false;
        }
    }

    public function exclui(Estoque $estoque)
    {
        $sql = 'DELETE FROM estoque WHERE idEstoque = ?';
        $pst = Conexao::getPreparedStatement($sql);
        $pst->bindValue(1, $estoque->getIdEstoque());

        try {
            $pst->execute();
            return true;
        } catch (PDOException $e) {
            echo "Erro ao excluir do estoque: " . $e->getMessage();
            return false;
        }
    }

    public function altera(Estoque $estoque)
    {
        $sql = 'UPDATE estoque SET idFornecedor = ?, nome = ?, preco = ?, quantidade = ? WHERE idEstoque = ?';
        $pst = Conexao::getPreparedStatement($sql);
        $pst->bindValue(1, $estoque->getIdFornecedor());
        $pst->bindValue(2, $estoque->getNome());
        $pst->bindValue(3, $estoque->getPreco());
        $pst->bindValue(4, $estoque->getQuantidade());
        $pst->bindValue(5, $estoque->getIdEstoque());

        try {
            $pst->execute();
            return true;
        } catch (PDOException $e) {
            echo "Erro ao alterar o estoque: " . $e->getMessage();
            return false;
        }
    }

    public function lista()
    {
        $lista = [];
        $pst = Conexao::getPreparedStatement('
            SELECT e.idEstoque, f.nome as fornecedor, e.nome, e.preco, e.quantidade
            FROM estoque as e
            INNER JOIN fornecedor as f ON f.idFornecedor = e.idFornecedor');
        
        try {
            $pst->execute();
            $lista = $pst->fetchAll(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            echo "Erro ao obter lista do estoque: " . $e->getMessage();
        }

        return $lista;
    }

    public function listaSimples()
    {
        $lista = [];
        $pst = Conexao::getPreparedStatement('SELECT * FROM estoque');
        
        try {
            $pst->execute();
            $lista = $pst->fetchAll(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            echo "Erro ao obter lista simples do estoque: " . $e->getMessage();
        }

        return $lista;
    }

    public function localiza($id)
    {
        $lista = [];
        $pst = Conexao::getPreparedStatement('SELECT * FROM estoque WHERE idEstoque = ?');
        $pst->bindValue(1, $id);

        try {
            $pst->execute();
            $lista = $pst->fetchAll(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            echo "Erro ao localizar no estoque: " . $e->getMessage();
        }

        return $lista;
    }

    public function verificaEstoque($id)
    {
        $lista = [];
        $pst = Conexao::getPreparedStatement('SELECT quantidade FROM estoque WHERE idEstoque = ?');
        $pst->bindValue(1, $id);

        try {
            $pst->execute();
            $lista = $pst->fetchAll(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            echo "Erro ao verificar o estoque: " . $e->getMessage();
        }

        return $lista;
    }
}
?>
