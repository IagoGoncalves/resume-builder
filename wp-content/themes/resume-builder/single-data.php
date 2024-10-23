<?php
get_header(); 
?>
<main id="print-section" class="data" tabindex="-1" role="main">
    <div class="resume-personal-data">
        <figure><img src="<?= get_field('dados_pessoais_foto_de_perfil');?>" alt="Foto de perfil"></figure>
        <div class="resume-photo">
            <p class="nome-title"><?= get_field('dados_pessoais_nome_completo');?></p>
            <p><?= get_field('dados_pessoais_idade') . ', ' . get_field('dados_pessoais_sexo') . ', ' . get_field('dados_pessoais_estado_civil') . ', ' . get_field('dados_pessoais_nacionalidade');?></p>
            <p><?= get_field('dados_pessoais_endereco') . ' - ' . get_field('dados_pessoais_cidade') . ' - ' . get_field('dados_pessoais_estado'); ?></p>
            <p><?= get_field('dados_pessoais_telefone_1');?></p>
            <p><?= get_field('dados_pessoais_telefone_2');?></p>
            <a href="<?= get_field('dados_pessoais_email');?>"><?= get_field('dados_pessoais_email');?></a>
        </div>
    </div>
    <div class="resume-goals">
        <h2 class="title-print">Objetivo</h2>
        <p><?= get_field('objetivo')?></p>
    </div>
    <?php if( have_rows('formacao_academica') ): ?>
        <div class="resume-academic-education">
            <h2 class="title-print">Formação acadêmica</h2>
            <?php while( have_rows('formacao_academica') ): the_row(); ?>
                <span>
                    <h3><?php the_sub_field('nome_do_curso'); ?></h3>
                    <p><?php the_sub_field('instituicao'); ?></p>
                    <p><?= the_sub_field('nivel_do_curso');?>, <?= the_sub_field('mes_e_ano_da_conclusao'); ?></p>
                </span>
            <?php endwhile; ?>
        </div>
    <?php endif; ?>
    <?php if( have_rows('experiencia_profissional') ): ?>
        <div class="resume-professional-experience">
            <h2 class="title-print">Experiência profissional</h2>
            <?php while( have_rows('experiencia_profissional') ): the_row(); ?>
                <span>
                    <h3><?php the_sub_field('nome_da_empresa'); ?></h3>
                    <p><?= the_sub_field('mes_e_ano_de_inicio');?> - <?= the_sub_field('mes_e_ano_de_saida'); ?></p>
                    <p><?php the_sub_field('principais_atividades_desempenhadas_no_cargo'); ?></p>
                </span>
            <?php endwhile; ?>
        </div>
    <?php endif; ?>
    <?php if( have_rows('qualificacoes_e_atividades_complementares') ): ?>
        <div class="resume-qualify">
            <h2 class="title-print">Qualificações e atividades complementares</h2>
            <?php while( have_rows('qualificacoes_e_atividades_complementares') ): the_row(); ?>
                <p><?php the_sub_field('qualificacao'); ?></p>
            <?php endwhile; ?>
        </div>
    <?php endif; ?>
    <?php if( have_rows('informacoes_adicionais') ): ?>
        <div class="resume-aditional-info">
            <h2 class="title-print">Informações adicionais</h2>
            <?php while( have_rows('informacoes_adicionais') ): the_row(); ?>
                <p><?php the_sub_field('informacao'); ?></p>
            <?php endwhile; ?>
        </div>
    <?php endif; ?>
</main>
<?php
get_footer();
?>
