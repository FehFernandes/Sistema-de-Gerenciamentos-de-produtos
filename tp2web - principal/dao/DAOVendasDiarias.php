<?php
class DAOVendasDiarias
{
    public function inclui(VendasDiarias $vendasDiarias)
    {
        $sql = 'INSERT INTO vendasDiarias (data, valor, idFuncionario) VALUES (?, ?, ?)';
        $pst = Conexao::getPreparedStatement($sql);
        $pst->bindValue(1, $vendasDiarias->getData());
        $pst->bindValue(2, $vendasDiarias->getValor());
        $pst->bindValue(3, $vendasDiarias->getIdFuncionario());

        try {
            $pst->execute();
            return true;
        } catch (PDOException $e) {
            // Registre a mensagem de erro em logs em produção
            echo "Erro ao incluir venda diária: " . $e->getMessage();
            return false;
        }
    }

    public function exclui(VendasDiarias $vendasDiarias)
    {
        $sql = 'DELETE FROM vendasDiarias WHERE idVendasDiarias = ?';
        $pst = Conexao::getPreparedStatement($sql);
        $pst->bindValue(1, $vendasDiarias->getIdVendasDiarias());

        try {
            $pst->execute();
            return true;
        } catch (PDOException $e) {
            echo "Erro ao excluir venda diária: " . $e->getMessage();
            return false;
        }
    }

    public function altera(VendasDiarias $vendasDiarias)
    {
        $sql = 'UPDATE vendasDiarias SET data = ?, valor = ?, idFuncionario = ? WHERE idVendasDiarias = ?';
        $pst = Conexao::getPreparedStatement($sql);
        $pst->bindValue(1, $vendasDiarias->getData());
        $pst->bindValue(2, $vendasDiarias->getValor());
        $pst->bindValue(3, $vendasDiarias->getIdFuncionario());
        $pst->bindValue(4, $vendasDiarias->getIdVendasDiarias());

        try {
            $pst->execute();
            return true;
        } catch (PDOException $e) {
            echo "Erro ao alterar venda diária: " . $e->getMessage();
            return false;
        }
    }

    public function lista()
    {
        $lista = [];
        $pst = Conexao::getPreparedStatement('
            SELECT vd.idVendasDiarias, f.nome, vd.data, vd.valor
            FROM vendasdiarias AS vd
            INNER JOIN funcionario AS f ON f.idFuncionario = vd.idFuncionario');
        
        try {
            $pst->execute();
            $lista = $pst->fetchAll(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            echo "Erro ao obter lista de vendas diárias: " . $e->getMessage();
        }

        return $lista;
    }

    public function localiza($id)
    {
        $lista = [];
        $pst = Conexao::getPreparedStatement('SELECT * FROM vendasDiarias WHERE idVendasDiarias = ?');
        $pst->bindValue(1, $id);

        try {
            $pst->execute();
            $lista = $pst->fetchAll(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            echo "Erro ao localizar venda diária: " . $e->getMessage();
        }

        return $lista;
    }
}
?>
