<form role="search" method="get" class="search-form" action="<?php echo home_url('/'); ?>">
    <input type="search" class="search-field subtitle" placeholder="<?php echo esc_attr_x('O que você procura?', 'placeholder') ?>" value="<?php echo get_search_query() ?>" name="s" title="<?php echo esc_attr_x('Search for:', 'label') ?>" />
    <button type="submit" class="search-submit">
        <svg xmlns="http://www.w3.org/2000/svg" width="31" height="31" viewBox="0 0 31 31" fill="none">
            <g clip-path="url(#clip0_2_714)">
                <path d="M20.3516 3.93265C15.7751 -0.643891 8.32639 -0.643891 3.74985 3.93265C-0.825695 8.51018 -0.825695 15.9578 3.74985 20.5354C7.82538 24.6099 14.1728 25.0464 18.7464 21.8648C18.8426 22.3202 19.0629 22.7547 19.417 23.1089L26.0819 29.7738C27.0532 30.7431 28.6227 30.7431 29.589 29.7738C30.5593 28.8035 30.5593 27.234 29.589 26.2667L22.9241 19.5998C22.5719 19.2486 22.1364 19.0274 21.681 18.9312C24.8646 14.3566 24.4281 8.01017 20.3516 3.93265ZM18.2474 18.4311C14.8306 21.8479 9.26988 21.8479 5.85409 18.4311C2.43929 15.0144 2.43929 9.45466 5.85409 6.03788C9.26988 2.62209 14.8306 2.62209 18.2474 6.03788C21.6641 9.45466 21.6641 15.0144 18.2474 18.4311Z" fill="#F32963"/>
            </g>
            <defs>
                <clipPath id="clip0_2_714">
                    <rect width="30" height="30" fill="white" transform="translate(0.317078 0.5)"/>
                </clipPath>
            </defs>
        </svg>
    </button>
</form>
