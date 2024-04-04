<?php
class DAOFornecedor
{
    public function inclui(Fornecedor $fornecedor)
    {
        $sql = 'INSERT INTO fornecedor (nome, endereco) VALUES (?, ?)';
        $pst = Conexao::getPreparedStatement($sql);
        $pst->bindValue(1, $fornecedor->getNome());
        $pst->bindValue(2, $fornecedor->getEndereco());

        try {
            $pst->execute();
            return true;
        } catch (PDOException $e) {
            // Registre a mensagem de erro em logs em produção
            echo "Erro ao incluir fornecedor: " . $e->getMessage();
            return false;
        }
    }

    public function exclui(Fornecedor $fornecedor)
    {
        $sql = 'DELETE FROM fornecedor WHERE idFornecedor = ?';
        $pst = Conexao::getPreparedStatement($sql);
        $pst->bindValue(1, $fornecedor->getIdFornecedor());

        try {
            $pst->execute();
            return true;
        } catch (PDOException $e) {
            echo "Erro ao excluir fornecedor: " . $e->getMessage();
            return false;
        }
    }

    public function altera(Fornecedor $fornecedor)
    {
        $sql = 'UPDATE fornecedor SET nome = ?, endereco = ? WHERE idFornecedor = ?';
        $pst = Conexao::getPreparedStatement($sql);
        $pst->bindValue(1, $fornecedor->getNome());
        $pst->bindValue(2, $fornecedor->getEndereco());
        $pst->bindValue(3, $fornecedor->getIdFornecedor());

        try {
            $pst->execute();
            return true;
        } catch (PDOException $e) {
            echo "Erro ao alterar fornecedor: " . $e->getMessage();
            return false;
        }
    }

    public function lista()
    {
        $lista = [];
        $pst = Conexao::getPreparedStatement('SELECT * FROM fornecedor');

        try {
            $pst->execute();
            $lista = $pst->fetchAll(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            echo "Erro ao obter lista de fornecedores: " . $e->getMessage();
        }

        return $lista;
    }

    public function localiza($id)
    {
        $lista = [];
        $pst = Conexao::getPreparedStatement('SELECT * FROM fornecedor WHERE idFornecedor = ?');
        $pst->bindValue(1, $id);

        try {
            $pst->execute();
            $lista = $pst->fetchAll(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            echo "Erro ao localizar fornecedor: " . $e->getMessage();
        }

        return $lista;
    }
}
?>
