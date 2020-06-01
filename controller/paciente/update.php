<?php
require_once '../../models/Paciente.php';

session_start();
$usuario = new Paciente();
$paciente =$_SESSION['usuario'];
$data = filter_input_array(INPUT_POST, FILTER_DEFAULT);
$usuario->setIdPaciente($paciente);

if($usuario->findInfo() == NULL){

    echo ("<form method='post' action='../../controller/paciente/dados_usuario' name='alterar_dados'>");
    echo ("<fieldset>");
    echo ("<legend>Dados Pessoais</legend>");
    echo (" <div style=\"font-size: 13px\">Selecione uma imagem de perfil com medidas de 60x60 para melhor ajuste.</div>");
    echo ("<input class=\"file-chooser\" type=\"file\" name=\"imgprof\" accept=\"image/*\">");
    echo ("<img class=\"preview-img\" width=\"80px\" height=\"80px\" style=\"border-radius: 100px\">");

    echo ("<table cellspacing=\"10\">");
    echo ("<tr>");
    echo ("<td>");
    echo ("<label>Nome Completo:  </label>");
    echo ("</td>");
    echo ("<td align=\"left\">");
    echo ("<input type='text' name='nome' class='form-control bg-light small' required>");
    echo ("</td>");
    echo ("</tr>");
    echo ("<tr>");
    echo ("<td>");
    echo ("<label>Nascimento: </label>");
    echo ("</td>");
    echo ("<td align=\"left\">");
    echo ("<input type=\"date\" name=\"nascimento\"  class=\"form-control bg-light small\" required>");
    echo ("</td>");
    echo ("</tr>");
    echo ("<tr>");
    echo ("<td>");
    echo ("<label for=\"rg\">RG: </label>");
    echo ("</td>");
    echo ("<td align=\"left\">");
    echo ("<input type=\"text\" name=\"rg\" size=\"13\" maxlength=\"13\" class=\"form-control bg-light small\" required>");
    echo ("</td>");
    echo ("</tr>");
    echo ("<tr>");
    echo ("<td>");
    echo ("<label>CPF:</label>");
    echo ("</td>");
    echo ("<td align=\"left\">");
    echo ("<input type=\"text\" name=\"cpf\" size=\"9\" maxlength=\"9\"  oninput=\"mascara(this, 'cpf')\"  class=\"form-control bg-light small\" required>");
    echo ("</td>");
    echo ("</tr>");
    echo ("</table>");
    echo ("</fieldset>");
    echo ("<br />");

    echo ("<fieldset>");
    echo ("<legend>Dados de Endereço</legend>");
    echo ("<table cellspacing=\"10\">");
    echo ("<tr>");
    echo ("<td>
          <label for=\"Logradouro\">Logradouro:</label>
          </td>
          <td align=\"left\">
          <input type=\"text\" name=\"logradouro\" class=\"form-control bg-light small\" required>
          </td>");


    echo("<tr>
          <td>
          <label for=\"numero\">Numero:</label>
          </td>
          <td align=\"left\">
          <input type=\"text\" name=\"numero\" class=\"form-control bg-light small\" required>
          </td>
          </tr>");


    echo ("<tr>
           <td>
           <label for=\"complemento\">Complemento: </label>
           </td>
           <td align=\"left\">
           <input type=\"text\" name=\"complemento\" class=\"form-control bg-light small\" '>
           </td>
           </tr>");
    echo ("<tr>
           <td>
           <label for=\"bairro\">Bairro: </label>
           </td>
           <td align=\"left\">
           <input type=\"text\" name=\"bairro\" class=\"form-control bg-light small\" required>
           </td>
           </tr>");
    echo ("<tr>
           <td>
           <label for=\"estado\">Estado:</label>
           </td>
           <td align=\"left\">
           <select name=\"estado\" class=\"form-control bg-light small\" required>
                                        <option value=\"\">Selecione um estado</option>
                                        <option value=\"AC\">Acre</option>
                                        <option value=\"AL\">Alagoas</option>
                                        <option value=\"AM\">Amazonas</option>
                                        <option value=\"AP\">Amapá</option>
                                        <option value=\"BA\">Bahia</option>
                                        <option value=\"CE\">Ceará</option>
                                        <option value=\"DF\">Distrito Federal</option>
                                        <option value=\"ES\">Espírito Santo</option>
                                        <option value=\"GO\">Goiás</option>
                                        <option value=\"MA\">Maranhão</option>
                                        <option value=\"MT\">Mato Grosso</option>
                                        <option value=\"MS\">Mato Grosso do Sul</option>
                                        <option value=\"MG\">Minas Gerais</option>
                                        <option value=\"PA\">Pará</option>
                                        <option value=\"PB\">Paraíba</option>
                                        <option value=\"PR\">Paraná</option>
                                        <option value=\"PE\">Pernambuco</option>
                                        <option value=\"PI\">Piauí</option>
                                        <option value=\"RJ\">Rio de Janeiro</option>
                                        <option value=\"RN\">Rio Grande do Norte</option>
                                        <option value=\"RO\">Rondônia</option>
                                        <option value=\"RS\">Rio Grande do Sul</option>
                                        <option value=\"RR\">Roraima</option>
                                        <option value=\"SC\">Santa Catarina</option>
                                        <option value=\"SE\">Sergipe</option>
                                        <option value=\"SP\">São Paulo</option>
                                        <option value=\"TO\">Tocantins</option>
           </select>                      
           </td>                    
           </tr>");
    echo ("<tr>
           <td>
           <label for=\"cidade\">Cidade: </label>
           </td>
           <td align=\"left\">
           <input type=\"text\" name=\"cidade\" class=\"form-control bg-light small\" required>
           </td>
           </tr>");
    echo ("<tr>
           <td>
           <label for=\"cep\">CEP: </label>
           </td>
           <td align=\"left\">
           <input type=\"text\" name=\"cep\" size=\"5\"  oninput=\"mascara(this, 'cep')\" class=\"form-control bg-light small\" required>");
    echo ("</td>");
    echo ("</tr>");
    echo ("</table>");
    echo ("</fieldset>");
    echo ("<br />");

    echo ("<fieldset<legend>Dados de Acesso</legend>");
    echo ("<table cellspacing=\"10\">");
    echo ("</tr>");
    echo ("<td>");
    echo ("<label for=\"email\">E-mail: </label>");
    echo ("</td>");
    echo ("<td align=\"left\">");
    echo ("<input type=\"text\" name=\"email\" class=\"form-control bg-light small\" required>");
    echo ("</td>");
    echo ("</tr>");
    echo ("<tr>");
    echo ("</tr>");
    echo ("<td>");
    echo ("<label for=\"Telefone\">Senha: </label>");
    echo ("</td>");
    echo ("<td align=\"left\">");
    echo ("<input type=\"text\" name=\"telefone\"  class=\"form-control bg-light small\" required>");
    echo ("</td>");
    echo ("</tr>");
    echo ("<tr>");
    echo ("</table>");
    echo ("</fieldset>");
    echo ("<br />");
    echo ("<input type=\"submit\" value=\"Atualizar dados\" class=\"btn btn-primary\">");
    echo ("</form>");
    echo ("<br/>");
    echo ("<br/>");
    echo ("<button value=\"Excluir conta\" class=\"btn-google btn btn-primary\">Excluir conta</button>");
    echo("<br/>");


}

else{

foreach($usuario->findInfo() as $key => $value)
{

    echo ("<form method='post' action='../../controller/paciente/dados_usuario' name='alterar_dados'>");
    echo ("<fieldset>");
    echo ("<legend>Dados Pessoais</legend>");
    echo (" <div style=\"font-size: 13px\">Selecione uma imagem de perfil com medidas de 60x60 para melhor ajuste.</div>");
    echo ("<input class=\"file-chooser\" type=\"file\" name=\"imgprof\" accept=\"image/*\">");
    echo ("<img class=\"preview-img\" width=\"80px\" height=\"80px\" style=\"border-radius: 100px\">");

    echo ("<table cellspacing=\"10\">");
    echo ("<tr>");
    echo ("<td>");
    echo ("<label>Nome Completo:  </label>");
    echo ("</td>");
    echo ("<td align=\"left\">");
    echo ("<input type='text' name='nome' class='form-control bg-light small' value='$value->nomec' required>");
    echo ("</td>");
    echo ("</tr>");
    echo ("<tr>");
    echo ("<td>");
    echo ("<label>Nascimento: </label>");
    echo ("</td>");
    echo ("<td align=\"left\">");
    echo ("<input type=\"date\" name=\"nascimento\"  class=\"form-control bg-light small\"  value='$value->nascimento' required>");
    echo ("</td>");
    echo ("</tr>");
    echo ("<tr>");
    echo ("<td>");
    echo ("<label for=\"rg\">RG: </label>");
    echo ("</td>");
    echo ("<td align=\"left\">");
    echo ("<input type=\"text\" name=\"rg\" size=\"13\" maxlength=\"13\" class=\"form-control bg-light small\" value='$value->rg' required>");
    echo ("</td>");
    echo ("</tr>");
    echo ("<tr>");
    echo ("<td>");
    echo ("<label>CPF:</label>");
    echo ("</td>");
    echo ("<td align=\"left\">");
    echo ("<input type=\"text\" name=\"cpf\" size=\"9\" maxlength=\"9\"  oninput=\"mascara(this, 'cpf')\"  class=\"form-control bg-light small\" value='$value->cpf' required>");
    echo ("</td>");
    echo ("</tr>");
    echo ("</table>");
    echo ("</fieldset>");
    echo ("<br />");

    echo ("<fieldset>");
    echo ("<legend>Dados de Endereço</legend>");
    echo ("<table cellspacing=\"10\">");
    echo ("<tr>");
    echo ("<td>
          <label for=\"Logradouro\">Logradouro:</label>
          </td>
          <td align=\"left\">
          <input type=\"text\" name=\"logradouro\" class=\"form-control bg-light small\" value='$value->logradouro' required>
          </td>");


    echo("<tr>
          <td>
          <label for=\"numero\">Numero:</label>
          </td>
          <td align=\"left\">
          <input type=\"text\" name=\"numero\" class=\"form-control bg-light small\" value='$value->numerocasa' required>
          </td>
          </tr>");


    echo ("<tr>
           <td>
           <label for=\"complemento\">Complemento: </label>
           </td>
           <td align=\"left\">
           <input type=\"text\" name=\"complemento\" class=\"form-control bg-light small\" value='$value->complemento'>
           </td>
           </tr>");
    echo ("<tr>
           <td>
           <label for=\"bairro\">Bairro: </label>
           </td>
           <td align=\"left\">
           <input type=\"text\" name=\"bairro\" class=\"form-control bg-light small\" value='$value->bairro' required>
           </td>
           </tr>");
    echo ("<tr>
           <td>
           <label for=\"estado\">Estado:</label>
           </td>
           <td align=\"left\">
           <select name=\"estado\" class=\"form-control bg-light small\" required>
                                        <option value='$value->estado'>$value->estado</option>
                                        <option value=\"AC\">Acre</option>
                                        <option value=\"AL\">Alagoas</option>
                                        <option value=\"AM\">Amazonas</option>
                                        <option value=\"AP\">Amapá</option>
                                        <option value=\"BA\">Bahia</option>
                                        <option value=\"CE\">Ceará</option>
                                        <option value=\"DF\">Distrito Federal</option>
                                        <option value=\"ES\">Espírito Santo</option>
                                        <option value=\"GO\">Goiás</option>
                                        <option value=\"MA\">Maranhão</option>
                                        <option value=\"MT\">Mato Grosso</option>
                                        <option value=\"MS\">Mato Grosso do Sul</option>
                                        <option value=\"MG\">Minas Gerais</option>
                                        <option value=\"PA\">Pará</option>
                                        <option value=\"PB\">Paraíba</option>
                                        <option value=\"PR\">Paraná</option>
                                        <option value=\"PE\">Pernambuco</option>
                                        <option value=\"PI\">Piauí</option>
                                        <option value=\"RJ\">Rio de Janeiro</option>
                                        <option value=\"RN\">Rio Grande do Norte</option>
                                        <option value=\"RO\">Rondônia</option>
                                        <option value=\"RS\">Rio Grande do Sul</option>
                                        <option value=\"RR\">Roraima</option>
                                        <option value=\"SC\">Santa Catarina</option>
                                        <option value=\"SE\">Sergipe</option>
                                        <option value=\"SP\">São Paulo</option>
                                        <option value=\"TO\">Tocantins</option>
           </select>                      
           </td>                    
           </tr>");
    echo ("<tr>
           <td>
           <label for=\"cidade\">Cidade: </label>
           </td>
           <td align=\"left\">
           <input type=\"text\" name=\"cidade\" class=\"form-control bg-light small\" value='$value->cidade' required>
           </td>
           </tr>");
    echo ("<tr>
           <td>
           <label for=\"cep\">CEP: </label>
           </td>
           <td align=\"left\">
           <input type=\"text\" name=\"cep\" size=\"5\"  oninput=\"mascara(this, 'cep')\" class=\"form-control bg-light small\" value='$value->cep' required>");
    echo ("</td>");
    echo ("</tr>");
    echo ("</table>");
    echo ("</fieldset>");
    echo ("<br />");

    echo ("<fieldset<legend>Dados de Acesso</legend>");
    echo ("<table cellspacing=\"10\">");
    echo ("</tr>");
    echo ("<td>");
    echo ("<label for=\"email\">E-mail: </label>");
    echo ("</td>");
    echo ("<td align=\"left\">");
    echo ("<input type=\"text\" name=\"email\" class=\"form-control bg-light small\" value='$value->email' required>");
    echo ("</td>");
    echo ("</tr>");
    echo ("<tr>");
    echo ("</tr>");
    echo ("<td>");
    echo ("<label for=\"Telefone\">Senha: </label>");
    echo ("</td>");
    echo ("<td align=\"left\">");
    echo ("<input type=\"text\" name=\"telefone\"  class=\"form-control bg-light small\" value='$value->telefone' required>");
    echo ("</td>");
    echo ("</tr>");
    echo ("<tr>");
    echo ("</table>");
    echo ("</fieldset>");
    echo ("<br />");
    echo ("<input type=\"submit\" value=\"Atualizar dados\" class=\"btn btn-primary\">");
    echo ("</form>");
    echo ("<br/>");
    echo ("<br/>");
    echo ("<button value=\"Excluir conta\" class=\"btn-google btn btn-primary\">Excluir conta</button>");
    echo("<br/>");



}
}